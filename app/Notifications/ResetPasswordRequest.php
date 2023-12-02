<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class ResetPasswordRequest extends Notification implements ShouldQueue
{
    use Queueable;
    protected $token;
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($token)
    {
        $this->token = $token;
    }
    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
        return ['mail'];
    }
     /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(route('mat-khau-moi', ['token' => $this->token]));
        // "D:\xampp\htdocs\laravel-app\public\img\logomail.jpg"
        return (new MailMessage)
        ->from('ngoanth.22it@vku.udn.vn', 'Tô Hiếu Ngoan')
        ->subject('Yêu cầu đổi mật khẩu')
            ->line('Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.')
            ->action('Đặt lại mật khẩu', $url)
            
            ->line('Nếu bạn không yêu cầu đặt lại mật khẩu thì vui lòng bỏ qua thông báo này.');
            
    }
    
}
