<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Product::factory()->create([
        'name' => 'Gijsbert de gans',
        'image_url' => 'https://1567162731.rsc.cdn77.org/content/images/thumbs/001/0013953_little-dutch-knuffel-little-goose-klein-20-cm-little-goose-0.jpeg',
        'color' => 'wit',
        'type' => 'wild dier',
        'category' => 1,
        'price' => 20,
      ]);

      Product::factory()->create([
        'name' => 'Ollie de olifant',
        'image_url' => 'https://difrax.com/cdn/shop/files/knuffel-226-lst-nl-1.jpg?v=1699873215&width=1500',
        'color' => 'grijs',
        'type' => 'wild dier',
        'category' => 1,
        'price' => 18,
      ]);

      Product::factory()->create([
        'name' => 'Ivan de ijsbeer',
        'image_url' => 'https://www.mooistekinderkamer.nl/wp-content/uploads/sites/3/2021/12/Slaapknuffel-Humming-Moonie-beer-creme-wit-mooiste-kinderkamer-1-300x300.jpg',
        'color' => 'wit',
        'type' => 'beer',
        'category' => 1,
        'price' => 33,
      ]);

      Product::factory()->create([
        'name' => 'Otis de olifant',
        'image_url' => 'https://www.primodo.nl/img/medium/pluche-grijze-zittende-olifant-knuffel-18-cm-speelgoed/10144/823.jpg',
        'color' => 'grijs',
        'type' => 'wild dier',
        'category' => 1,
        'price' => 12.5,
      ]);

      Product::factory()->create([
        'name' => 'Ella de Egel',
        'image_url' => 'https://cdn.webshopapp.com/shops/14886/files/358534829/egel-knuffel-25-cm.jpg',
        'color' => 'bruin',
        'type' => 'wild dier',
        'category' => 1,
        'price' => 29.5,
      ]);

      Product::factory()->create([
        'name' => 'Kasper het Konijn',
        'image_url' => 'https://media.s-bol.com/B2xl6ExM7Joo/ZAGAQ5/550x546.jpg',
        'color' => 'bruin',
        'type' => 'huisdier',
        'category' => 1,
        'price' => 19.5,
      ]);

      Product::factory()->create([
        'name' => 'Benjamin de Beer',
        'image_url' => 'https://www.knuffelparadijs.nl/img/medium/pluche-bruine-beer-beren-knuffel-15-cm-speelgoed/10183/891.jpg',
        'color' => 'bruin',
        'type' => 'beer',
        'category' => 1,
        'price' => 13.5,
      ]);

      Product::factory()->create([
        'name' => 'Bram de Beer',
        'image_url' => 'https://media.s-bol.com/x5GpKD9jjA3z/QllO19/550x658.jpg',
        'color' => 'grijs',
        'type' => 'beer',
        'category' => 1,
        'price' => 47.5,
      ]);

      Product::factory()->create([
        'name' => 'Bo de Beer',
        'image_url' => 'https://www.planethappy.nl/resize/barrb1br_8138764465524.jpg/0/1100/True/jellycat-knuffel-bartholomew-beer-echt-groot-16x32x56cm.jpg',
        'color' => 'bruin',
        'type' => 'beer',
        'category' => 1,
        'price' => 22.5,
      ]);

      Product::factory()->create([
        'name' => 'Kira het Konijn',
        'image_url' => 'https://hetblijesnoetje.nl/cdn/shop/products/konijnwit.jpg?v=1643917883',
        'color' => 'wit',
        'type' => 'huisdier',
        'category' => 1,
        'price' => 13.5,
      ]);

      Product::factory()->create([
        'name' => 'Koko het Konijn',
        'image_url' => 'https://cdn.webshopapp.com/shops/259975/files/449666838/325x375x2/little-dutch-knuffel-doekje-bunny.jpg',
        'color' => 'bruin',
        'type' => 'huisdier',
        'category' => 1,
        'price' => 11.5,
      ]);

      Product::factory()->create([
        'name' => 'Henry de hond',
        'image_url' => 'https://cdn.webshopapp.com/shops/260902/files/419677728/890x820x2/hermann-teddy-knuffel-hond-bruin-28cm.jpg',
        'color' => 'bruin',
        'type' => 'huisdier',
        'category' => 1,
        'price' => 21.5,
      ]);

      Product::factory()->create([
        'name' => 'Harm de hond',
        'image_url' => 'https://hwimages.beslist.net/beslist-images/osEpCqTYKZrLLCcHRcWuNHauME/394/F300/2ae41f6110e161f80b0bb6b50e43cc36/Poppen/Take-Me-Home-Knuffel-Hond-Liggend-Pluche%2C70cm.jpg',
        'color' => 'bruin',
        'type' => 'huisdier',
        'category' => 1,
        'price' => 39.5,
      ]);

      Product::factory()->create([
        'name' => 'Sam de schildpad',
        'image_url' => 'https://www.kidsdeco.nl/media/catalog/product/cache/d58547df719c65c55a252a98e81f8008/c/l/cloud.b_knuffel_met_licht_en_geluid_schildpad_1_.png',
        'color' => 'blauw',
        'type' => 'wild dier',
        'category' => 1,
        'price' => 38.75,
      ]);

      Product::factory()->create([
        'name' => 'Isa de ijsbeer',
        'image_url' => 'https://www.wwf.nl/globalassets/commerce/productafbeeldingen/wwf-knuffel-ijsbeer-22cm-zittend-nw-01.jpg',
        'color' => 'wit',
        'type' => 'wild dier',
        'category' => 1,
        'price' => 19.5,
      ]);

      Product::factory()->create([
        'name' => 'Kenza het Konijn',
        'image_url' => 'https://www.kids-world.com/images/417px/GJ861.jpg',
        'color' => 'roze',
        'type' => 'huisdier',
        'category' => 1,
        'price' => 55.5,
      ]);

      Product::factory()->create([
        'name' => 'Adam de aap',
        'image_url' => 'https://www.plucheknuffel.nl/pub/media/catalog/product/1/0/1050482.jpg',
        'color' => 'bruin',
        'type' => 'wild dier',
        'category' => 1,
        'price' => 35.5,
      ]);

      Product::factory()->create([
        'name' => 'Peter het peperkoekmannetje',
        'image_url' => 'https://m.media-amazon.com/images/I/610bgT+QR3L._AC_UF1000,1000_QL80_.jpg',
        'color' => 'bruin',
        'type' => 'kerst',
        'category' => 2,
        'price' => 14.5,
      ]);

      Product::factory()->create([
        'name' => 'Rens het rendier',
        'image_url' => 'https://media.s-bol.com/qllVnDjZJXg2/816x1200.jpg',
        'color' => 'bruin',
        'type' => 'kerst',
        'category' => 2,
        'price' => 15,
      ]);

      Product::factory()->create([
        'name' => 'Bobby de beer',
        'image_url' => 'https://media.s-bol.com/7p2wy5B38pnw/550x547.jpg',
        'color' => 'bruin',
        'type' => 'kerst',
        'category' => 2,
        'price' => 29.5,
      ]);

      Product::factory()->create([
        'name' => 'Boris de beer',
        'image_url' => 'https://cdn.webshopapp.com/shops/260902/files/466403464/890x820x2/hermann-teddy-knuffel-kerst-teddybeer-30cm.jpg',
        'color' => 'bruin',
        'type' => 'kerst',
        'category' => 2,
        'price' => 16.5,
      ]);

      Product::factory()->create([
        'name' => 'Enzo de eikel',
        'image_url' => 'https://grasonderjevoeten.nl/wp-content/uploads/670983122541_Jellycat-Amuseable-Acorn-Knuffel-Eikel-11-cm.jpg',
        'color' => 'bruin',
        'type' => 'herfst',
        'category' => 2,
        'price' => 17,
      ]);
      
      Product::factory()->create([
        'name' => 'Vanessa de vos',
        'image_url' => 'https://cdn.webshopapp.com/shops/71467/files/73107440/jellycat-knuffels-knuffeldoekje-vos-jellycat-h-23.jpg',
        'color' => 'bruin',
        'type' => 'herfst',
        'category' => 2,
        'price' => 15.5,
      ]);
      
      Product::factory()->create([
        'name' => 'Pippa de pompoen',
        'image_url' => 'https://grasonderjevoeten.nl/wp-content/uploads/670983123883_Jellycat-Vivacious-Vegetable-Pumpkin-Knuffel-Pompoen-14-cm.jpg',
        'color' => 'bruin',
        'type' => 'herfst',
        'category' => 2,
        'price' => 14.5,
      ]);
      
      Product::factory()->create([
        'name' => 'Tara de taart',
        'image_url' => 'https://cdn.webshopapp.com/shops/297397/files/421725664/1500x1500x2/jellycat-amuseable-birthday-cake.jpg',
        'color' => 'roze',
        'type' => 'verjaardag',
        'category' => 2,
        'price' => 22.5,
      ]);
      
      Product::factory()->create([
        'name' => 'Tomas de taartpunt',
        'image_url' => 'https://cdn.webshopapp.com/shops/297397/files/421725664/1500x1500x2/jellycat-amuseable-birthday-cake.jpg',
        'color' => 'rood',
        'type' => 'verjaardag',
        'category' => 2,
        'price' => 13,
      ]);
      
      Product::factory()->create([
        'name' => 'Petra de piet',
        'image_url' => 'https://media.s-bol.com/7JjJ6wn5yYmO/5Wm2Ev/454x840.jpg',
        'color' => 'zwart',
        'type' => 'sinterklaas',
        'category' => 2,
        'price' => 21.5,
      ]);
      
      Product::factory()->create([
        'name' => 'Sientje de sint',
        'image_url' => 'https://www.vmtraktaties.nl/assets/webshop/thumbs/600/941_1.jpg',
        'color' => 'rood',
        'type' => 'sinterklaas',
        'category' => 2,
        'price' => 21,
      ]);
      
      Product::factory()->create([
        'name' => 'Billie de beer',
        'image_url' => 'https://www.bebetos.nl/wp-content/uploads/2025/01/beer.jpg',
        'color' => 'bruin',
        'type' => 'beer',
        'category' => 3,
        'price' => 41.5,
      ]);
      
      Product::factory()->create([
        'name' => 'Arie de aap',
        'image_url' => 'https://www.kraam-cadeau.nl//Files/2/79000/79723/ProductPhotos/1920x620/2038952079.jpg',
        'color' => 'grijs',
        'type' => 'wild dier',
        'category' => 3,
        'price' => 49.5,
      ]);
      
      Product::factory()->create([
        'name' => 'Kasper het konijn',
        'image_url' => 'https://www.tilleys.nl/media/catalog/product/cache/1cb6035d8253075f8574abc32583876d/H/A/HAFA3C_1_1cfb.JPG',
        'color' => 'groen',
        'type' => 'huisdier',
        'category' => 3,
        'price' => 49.5,
      ]);
      
      Product::factory()->create([
        'name' => 'Koen het konijn',
        'image_url' => 'https://www.tilleys.nl/media/catalog/product/cache/1cb6035d8253075f8574abc32583876d/H/A/HA1FD3_1_5535.JPG',
        'color' => 'blauw',
        'type' => 'huisdier',
        'category' => 3,
        'price' => 50,
      ]);
      
      Product::factory()->create([
        'name' => 'Kato het konijn',
        'image_url' => 'https://www.kidsdeco.nl/media/catalog/product/cache/d58547df719c65c55a252a98e81f8008/k/n/knuffeldoekje-bm-beige.jpg',
        'color' => 'bruin',
        'type' => 'huisdier',
        'category' => 3,
        'price' => 44.5,
      ]);
    }
}
