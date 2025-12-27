<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * نموذج طلب العضوية
 *
 * الحقول:
 * - user_id: معرّف المستخدم
 * - membership_type: نوع العضوية (basic, premium, enterprise)
 * - country: البلد من Enum
 * - company_name: اسم الشركة (اختياري)
 * - description: الوصف
 * - status: حالة الطلب (pending, approved, rejected)
 * - approved_by: من وافق على الطلب (admin/staff id)
 * - approval_date: تاريخ الموافقة
 */
class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership_type',
        'country',
        'company_name',
        'description',
        'status',
        'approved_by',
        'approval_date',
        'rejection_reason',
    ];

    protected $casts = [
        'approval_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * العلاقة مع المستخدم
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * من وافق على الطلب
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * الحصول على حالة الطلب بالعربية
     */
    public function getStatusLabel(): string
    {
        return match($this->status) {
            'pending' => 'قيد الانتظار',
            'approved' => 'موافق عليها',
            'rejected' => 'مرفوضة',
            default => 'غير معروفة',
        };
    }

    /**
     * الحصول على نوع العضوية بالعربية
     */
    public function getMembershipTypeLabel(): string
    {
        return match($this->membership_type) {
            'basic' => 'عضوية أساسية',
            'premium' => 'عضوية متميزة',
            'enterprise' => 'عضوية مؤسسية',
            default => 'غير معروفة',
        };
    }

    /**
     * التحقق من أن الطلب قيد الانتظار
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * التحقق من أن الطلب موافق عليه
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    /**
     * التحقق من أن الطلب مرفوض
     */
    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }
}
