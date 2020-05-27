<?php

namespace Sebwite\FeedbackCompany\Console\Command;

use Sebwite\FeedbackCompany\Model\FeedbackCompanyApi;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Score extends Command
{
    const COMMAND_NAME = 'sebwite:feedbackcompany:score';

    /**
     * @var FeedbackCompanyApi
     */
    private $api;

    public function __construct(
        FeedbackCompanyApi $api
    ) {
        parent::__construct();
        $this->api = $api;
    }

    public function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription('Fetch and display FeedbackCompany score');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Fetching FeedbackCompany Score</info>');
        $score = $this->api->getAvgScore();
        $count = $this->api->getTotalReviews();
        $output->writeln("Average score is $score based on $count reviews");
    }
}
