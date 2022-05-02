# FacetWP - Infinite Scroll

WordPress plugin which adds infinite scroll functionality to FacetWP templates. Requires developer config.

Also requires the [FacetWP WordPress plugin](https://facetwp.com) to be installed and activated.

## Setup

Add the following code immediately after the loop / FacetWP template where you wish to have infinite scroll active. 

```<?= do_shortcode( '[facetwp facet="load_more"]' ); ?>```

## Troubleshooting

If it does not work straight away

1. Make sure that the FacetWP plugin is active.

2. Try re-indexing FacetWP via `Settings > FacetWP` screen in the WordPress admin.

3. Make sure you added the shortcode outside the loop.

4. Make sure there are no JavaScript errors anywhere else on the page, by checking the browser console.

## Disclaimers

This plugin is not endorsed or released by the FacetWP development team.

With great power, comes great responsibility. Before you use this plugin [consider whether you really need infinite scroll](https://hackernoon.com/stop-infinite-scrolling-on-your-website-now-ie6rg31eu).
