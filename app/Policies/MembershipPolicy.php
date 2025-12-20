<?php

namespace App\Policies;

use App\Models\Membership;
use App\Models\User;

class MembershipPolicy
{
    /**
     * التحقق من إمكانية عرض الطلب
     */
    public function view(User $user, Membership $membership): bool
    {
        // المالك أو من له صلاحية عرض جميع الطلبات
        return $user->id === $membership->user_id || $user->can('view memberships');
    }

    /**
     * التحقق من إمكانية تعديل الطلب
     */
    public function update(User $user, Membership $membership): bool
    {
        // فقط المالك والطلب معلق
        return $user->id === $membership->user_id
            && $membership->isPending();
    }

    /**
     * التحقق من إمكانية حذف الطلب
     */
    public function delete(User $user, Membership $membership): bool
    {
        // المالك (إذا كان معلقاً) أو من له صلاحية الحذف
        return ($user->id === $membership->user_id && $membership->isPending())
            || $user->can('delete memberships');
    }
}
