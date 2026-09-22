<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default Admin User if none exists
        if (User::count() === 0) {
            User::create([
                'name' => 'Nasir Multani (Admin)',
                'email' => 'admin@agmalwaysgoodmaking.in',
                'password' => Hash::make('admin12345'),
            ]);
        }

        // 2. Seed Site Settings
        $settings = [
            'company_name' => 'AGM Always Good Making',
            'contact_person' => 'Nasir Multani',
            'phone' => '9977350503',
            'whatsapp_phone' => '919977350503',
            'email' => 'info@agmalwaysgoodmaking.in',
            'gstin' => '23BQAPM4037J1Z1',
            'address' => '51 Dawoody Nagar, Khajrana, Indore, Madhya Pradesh - 452016',
            'workshop_address' => 'Shop No. C-1, Radha Kunj Colony, Near Ring Road, Khajrana, Indore - 452010',
            'working_hours' => '9:30 AM - 8:00 PM (All 7 Days Open)',
            'rating' => '4.2',
            'review_count' => '58',
            'years_experience' => '12+',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }

        // 3. Seed Services
        $services = [
            [
                'slug' => 'acrylic-modular-kitchen',
                'title' => 'Acrylic Modular Kitchen',
                'category' => 'modular_kitchen',
                'starting_price' => '850',
                'price_unit' => '/sq ft',
                'description' => 'Ultra-glossy, mirror-finish acrylic modular kitchens built with boiling water-proof (BWP) marine ply and European soft-close hinges. Highly resistant to stains, heat, and moisture.',
                'features' => [
                    'Scratch & UV resistant high-gloss acrylic finish',
                    'Termite-proof & Boiling Water Resistant HDHMR/Marine Ply',
                    'Soft-close tandem box drawers & pull-out pantries',
                    'Custom tailored layout (L-shape, U-shape, Island, Parallel)',
                    '10-Year structural warranty',
                ],
                'image_path' => 'portfolio/acrylic-kitchen.jpg',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'italian-modular-kitchen-cabinet',
                'title' => 'Italian Modular Kitchen Cabinets',
                'category' => 'modular_kitchen',
                'starting_price' => '850',
                'price_unit' => '/sq ft',
                'description' => 'Sleek Italian-inspired minimalist cabinets with handle-less push-to-open profiles, matte anti-fingerprint laminates, and smart internal organization accessories.',
                'features' => [
                    'Gola profile handle-less Italian aesthetics',
                    'Anti-fingerprint thermal matte lamination',
                    'Heavy-duty stainless steel wire baskets & carousels',
                    'Built-in appliance housings (hob, chimney, oven)',
                    'Precision factory edge-banding',
                ],
                'image_path' => 'portfolio/italian-kitchen.jpg',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'printed-wooden-sliding-wardrobe',
                'title' => 'Printed Wooden Sliding Wardrobes',
                'category' => 'wardrobe',
                'starting_price' => '1200',
                'price_unit' => '/sq ft',
                'description' => 'High-end custom sliding door wardrobes featuring digital printed glass or textured wooden panels. Silent heavy-duty top-hung track mechanisms for effortless movement.',
                'features' => [
                    'Custom printed lacquered glass or textured veneer',
                    'Heavy-duty German smooth sliding hardware',
                    'Full-height design maximizing vertical bedroom space',
                    'Integrated drawer lockers, tie racks & LED strip lighting',
                    'Soft cushioning stopper prevents door slamming',
                ],
                'image_path' => 'portfolio/printed-wardrobe.jpg',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'designer-wooden-bedroom-wardrobe',
                'title' => 'Designer Wooden Bedroom Wardrobe',
                'category' => 'wardrobe',
                'starting_price' => '900',
                'price_unit' => '/sq ft',
                'description' => 'Hinged and sliding wardrobes crafted with premium sundeck laminates, customized compartment divisions, integrated vanity mirrors, and concealed safety lockers.',
                'features' => [
                    'Premium 1mm suede/matte finish laminates',
                    'Heavy duty 100% rust-proof hinges & locks',
                    'Customized his-and-hers hanging and shelf sections',
                    'Durable 18mm calibrated plywood core',
                    'Termite & borer proof chemical treatment',
                ],
                'image_path' => 'portfolio/designer-wardrobe.jpg',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'aluminium-sliding-windows-glazing',
                'title' => 'Aluminium Sliding Windows & Glazing',
                'category' => 'glazing',
                'starting_price' => '380',
                'price_unit' => '/sq ft',
                'description' => 'Durable powder-coated and anodized aluminium sliding and casement window systems with toughened glass, weather seals, and mosquito mesh tracks.',
                'features' => [
                    'Jindal / Hindalco certified heavy-gauge aluminium sections',
                    'Toughened float glass (4mm to 12mm)',
                    'EPDM rubber gaskets for rain & dust tightness',
                    'Anodized or powder-coated in custom architectural colors',
                    'Smooth roller bearing tracks for decades of life',
                ],
                'image_path' => 'portfolio/aluminium-window.jpg',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'office-toughened-glass-partitions',
                'title' => 'Office Glass Partitions & Glazing',
                'category' => 'glazing',
                'starting_price' => '450',
                'price_unit' => '/sq ft',
                'description' => 'Sound-insulating frameless and slim aluminium framed glass partitions for modern offices, corporate conference rooms, and commercial showrooms.',
                'features' => [
                    '10mm / 12mm toughened safety glass',
                    'Acoustic insulation between cabins',
                    'Frosted film or customized branding vinyl',
                    'Dorma / Enox certified patch fittings and floor springs',
                    'Rapid clean site installation',
                ],
                'image_path' => 'portfolio/aluminium-window.jpg',
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'slug' => 'pop-gypsum-false-ceiling',
                'title' => 'POP & Gypsum False Ceiling Services',
                'category' => 'ceiling',
                'starting_price' => '95',
                'price_unit' => '/sq ft',
                'description' => 'Custom Plaster of Paris (POP) and Gypsum board false ceiling designs with concealed cove lighting, acoustic thermal insulation, and seamless crack-free finishing.',
                'features' => [
                    'Saint-Gobain / Gyproc genuine materials',
                    'Laser-level precision framework alignment',
                    'Integrated cove & magnetic profile light channels',
                    'Thermal insulation reducing AC electrical bills',
                    'Fire & moisture resistant formulations',
                ],
                'image_path' => 'portfolio/pop-ceiling.jpg',
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'slug' => 'bungalow-home-renovation',
                'title' => 'Turnkey Bungalow & Home Renovation',
                'category' => 'interior',
                'starting_price' => null,
                'price_unit' => '',
                'description' => 'Complete end-to-end bungalow, flat, and villa interior renovation services in Indore. We manage structural woodwork, ceilings, modular fixtures, painting, and glazing under one roof.',
                'features' => [
                    'Single point of accountability with Nasir Multani',
                    'Complete 3D walkthrough & material selection assistance',
                    'Strict milestone-based execution timelines',
                    'Factory-made joinery for minimal on-site dust and delay',
                    'Zero hidden cost guarantee with itemized GST quote',
                ],
                'image_path' => 'portfolio/bungalow-renovation.jpg',
                'is_featured' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        // 4. Seed Portfolio Items
        $portfolio = [
            [
                'title' => 'High Gloss Acrylic Modular Kitchen with Breakfast Counter',
                'category' => 'kitchen',
                'image_path' => 'portfolio/acrylic-kitchen.jpg',
                'caption' => 'Installed at Nipania, Indore. Featuring dual-tone cappuccino acrylic, quartz countertop, and Blum soft-close fittings.',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Minimalist Italian Kitchen Cabinets with Profile Lighting',
                'category' => 'kitchen',
                'image_path' => 'portfolio/italian-kitchen.jpg',
                'caption' => 'Executed at Vijay Nagar, Indore. Gola profile handle-less design with tall pantry unit and built-in microwave slot.',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Digital Printed Glass Sliding Wardrobe',
                'category' => 'wardrobe',
                'image_path' => 'portfolio/printed-wardrobe.jpg',
                'caption' => 'Installed at Saket, Indore. 3-door full height sliding wardrobe with frosted geometric pattern and concealed vanity.',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Master Bedroom Wardrobe with Suede Finish Laminate',
                'category' => 'wardrobe',
                'image_path' => 'portfolio/designer-wardrobe.jpg',
                'caption' => 'Executed at Khajrana, Indore. Warm wood-grain laminate with soft champagne bronze handles and custom organizers.',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Designer Gypsum Ceiling with Warm LED Cove',
                'category' => 'ceiling',
                'image_path' => 'portfolio/pop-ceiling.jpg',
                'caption' => 'Executed at Mahalaxmi Nagar, Indore. Floating ceiling island with magnetic track lights.',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Anodized Aluminium Sliding Windows with Mosquito Net',
                'category' => 'glazing',
                'image_path' => 'portfolio/aluminium-window.jpg',
                'caption' => 'Installed for residential villa at Ring Road, Indore. 3-track sliding window system with toughened glass.',
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'Full Bungalow Living & Modular Interior Execution',
                'category' => 'interior',
                'image_path' => 'portfolio/bungalow-renovation.jpg',
                'caption' => 'Turnkey interior project at Silicon City, Indore. Seamless combination of ceilings, paneling, and modular storage.',
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Modern Kitchen Interior Layout & Lighting',
                'category' => 'kitchen',
                'image_path' => 'portfolio/kitchen-interior.jpg',
                'caption' => 'Compact 10x8 ft kitchen transformed with optimized drawer organizers and under-cabinet warm LEDs.',
                'is_featured' => false,
                'sort_order' => 8,
            ],
        ];

        foreach ($portfolio as $item) {
            PortfolioItem::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
