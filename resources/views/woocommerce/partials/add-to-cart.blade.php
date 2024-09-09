
  <div class="c-product-info__order">
    <form action="" data-product-order>

      @php
        $variableProduct = new WC_Product_Variable($product->get_id());
        $variations = $variableProduct->get_available_variations();
        $hasVariations = isset($variations) && count($variations) > 0;
      @endphp
      
      @if($hasVariations)
        <div class="c-product-info__options">
          <div class="c-product-info__options__label">Selecteer maat</div>
          <ul class="c-product-options">
            @foreach($variations as $variation)
              @php
                $variation_ID = $variation['variation_id'];
                $product_variation = new WC_Product_Variation($variation_ID);
                $product_ID = $product_variation->get_id();
                $product_attributes = $product_variation->get_variation_attributes();
                $product_length = $product_attributes['attribute_pa_lengte'];
                $product_sku = $product_variation->get_sku();
              @endphp

              @if ($product_length)
                <li class="c-product-options__item">
                  <label>
                    <input name="product-variant" type="radio" value="{{ $product_ID }}" data-product-order-option>
                    <div class="c-product-options__checkbox">{{ str_replace('-', ' ', $product_length) }}</div>
                  </label>
                </li>
              @endif
    
            @endforeach
          </ul>
        </div>
      @endif

      <input name="product" class="d-none" value="{{ $product->get_id(); }}" data-product-order-id>

      <button type="submit" class="c-product-info__order-btn btn btn-lila" {{ isset($product) && $hasVariations ? 'disabled' : ''}} data-product-order-submit>
        @svg('arrow-right')
        <span>Bestellen</span>
        <div class="btn-loader"></div>
      </button>

  </form>
</div>