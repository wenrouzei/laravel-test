<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;//Mail门面
use Illuminate\Support\Facades\Log;//Log门面

class SendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::raw('队列测试 test', function ($message) {
            $message->from('837597588@qq.com', 'lee');
            $message->sender('837597588@qq.com', 'lee');

            $message->subject('邮件主题');
            $message->to($this->email);
        });

        Log::info('已发送邮件测试 - '. $this->email);
    }
}
