<?php

namespace Sebwite\FeedbackCompany\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Sebwite\FeedbackCompany\Model\FeedbackCompanyApi;

/**
 * Class FeedbackCompanyReviews
 *
 * To add this to a block via layout XML:
 *
 * <referenceBlock name="some.block.name">
 *   <arguments>
 *     <argument name="feedback_company_reviews_view_model" xsi:type="object">\Sebwite\FeedbackCompany\ViewModel\FeedbackCompanyReviews</argument>
 *   </arguments>
 * </referenceBlock>
 *
 * Then to obtain review score from block template:
 *
 * $block->getFeedbackCompanyReviewsViewModel()->getAverageScore();
 * $block->getFeedbackCompanyReviewsViewModel()->getReviewCount();
 */
class FeedbackCompanyReviews implements ArgumentInterface
{
    /** @var FeedbackCompanyApi */
    protected $api;

    public function __construct(
        FeedbackCompanyApi $api
    ) {
        $this->api = $api;
    }

    public function getAverageScore() : float
    {
        return $this->api->getAvgScore();
    }

    public function getReviewCount() : float
    {
        return $this->api->getTotalReviews();
    }
}

