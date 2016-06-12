<?php


namespace App\Saedi\Transformers;

class TagSubscriptionTransformer extends Transformer
{
    /**
     * @param $subscription
     * @return array
     */
    public function transform($subscription)
    {
        return [
            'status' => $subscription[0],
        ];
    }
}