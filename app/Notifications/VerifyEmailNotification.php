<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */


     public function toMail(object $notifiable): MailMessage
     {
         $verificationUrl = $this->verificationUrl($notifiable); 
     
         return (new MailMessage)
             ->markdown('vendor.notifications.email', [
                 'greeting' => 'Xin chào!', // or set dynamically
                 'introLines' => [
                     'Chào mừng bạn đến với dịch vụ của chúng tôi!',
                     'Để hoàn tất quá trình đăng ký, vui lòng xác nhận địa chỉ email của bạn bằng cách nhấn vào nút bên dưới.'
                 ],
                 'actionText' => 'Xác nhận tài khoản',
                 'actionUrl' => $verificationUrl,
                 'outroLines' => [
                     'Cảm ơn bạn đã chọn chúng tôi.',
                     'Nếu bạn có bất kỳ câu hỏi nào, hãy liên hệ với chúng tôi!'
                 ],
                 'salutation' => 'Trân trọng, ' . config('app.name'),
             ]);
     }
     
    
    /**
     * Tạo URL xác nhận email.
     */
    protected function verificationUrl($notifiable): string
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );
    }
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
