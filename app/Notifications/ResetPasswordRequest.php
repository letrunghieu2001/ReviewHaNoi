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
        $url = url('reset-password/?token=' . $this->token);
        
        return (new MailMessage)
            ->line('Bạn nhận được mail này vì chúng tôi nhận được yêu cầu reset lại password từ ReviewHaNoi.')
            ->action('Reset Password', url($url))
            ->line('Nếu bạn không yêu cầu, hãy liên hệ với chúng tôi qua địa chỉ liên hệ chúng tôi để ở dưới website');
    }
}
