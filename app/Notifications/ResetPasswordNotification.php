<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    /**
     * Build the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('إشعار إعادة تعيين كلمة المرور')
            ->line('تلقينا طلباً لإعادة تعيين كلمة المرور الخاصة بك.')
            ->action('إعادة تعيين كلمة المرور', url(config('app.url').route('password.reset', [
                'token' => $this->token,
            ], false)))
            ->line('انتهاء صلاحية هذا الرابط خلال ' . config('auth.passwords.' . config('auth.defaults.passwords') . '.expire', 60) . ' دقيقة.')
            ->line('إذا لم تطلب إعادة تعيين كلمة المرور، فيرجى تجاهل هذا البريد الإلكتروني.')
            ->salutation('مع أطيب التحيات');
    }
}
