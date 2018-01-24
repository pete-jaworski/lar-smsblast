<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smsblast:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends SMS messages';

    /**
     *
     * @var \App\Helpers\TaskCollector 
     */
    protected $taskCollector;
    
    /**
     *
     * @var \App\Helpers\RecipientCollector 
     */
    protected $recipientsCollector;
    
    /**
     *
     * @var \App\Helpers\SMSSender 
     */
    protected $smsSender;
    
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
            \App\Helpers\TaskCollector $taskCollector,
            \App\Helpers\RecipientCollector $recipientsCollector,
            \App\Helpers\SMSSender $smsSender
    )
    {
        $this->taskCollector = $taskCollector;        
        $this->recipientsCollector = $recipientsCollector;        
        $this->smsSender = $smsSender;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->smsSender->send($this->recipientsCollector->getRecipients($this->taskCollector->getTasks()));
    }
}
