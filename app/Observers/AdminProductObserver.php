<?php

namespace App\Observers;

use App\Models\Admin\Product;
use Illuminate\Support\Carbon;

class AdminProductObserver
{
    public function creating(Product $product)
    {
        $this->setAlias($product);
    }

    /**
     * Handle the product "created" event.
     *
     * @param Product $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the product "updated" event.
     *
     * @param Product $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the product "restored" event.
     *
     * @param Product $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }

    public function setAlias(Product $product)
    {
        if (empty($product->alias)) {
            $product->alias = \Str::slug($product->title);

            $check = Product::where('alias', '=', $product->alias)->exists();

            if ($check) {
                $product->alias = \Str::slug($product->title) . time();
            }
        }
    }

    public function saving(Product $product)
    {
        $this->setPublishedAt($product);
    }

    public function setPublishedAt($product)
    {
        $needSetPublish = empty($product->updated_at) || !empty($product->updated_at);

        if($needSetPublish) {
            $product->updated_at = Carbon::now();
        }
    }
}
