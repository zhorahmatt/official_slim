<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\KirimEmail;

class SendConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new KirimEmail();
        Mail::to($this->data['email'])->send($email);
        /* $data = ['email' => $peserta->email, 'nama' => $peserta->nama_peserta ];
        Mail::send('jamselinas.pages.front.email', $data, function ($mail) use ($peserta)
        {
            // Email dikirimkan ke address "momo@deviluke.com" 
            // dengan nama penerima "Momo Velia Deviluke"
            $mail->to($peserta->email, $peserta->nama_peserta);

            $mail->subject('Terima Kasih Telah Mendaftar Jamselinas 8 Makassar 2018');
        }); */
    }
}
