<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    public function run()
    {
        // Clear the table before seeding
        // DB::table('websites')->truncate();

        // Function to generate masked URL
        function generateMaskedUrl($url)
        {
            $parsedUrl = parse_url($url); // Parse the URL
            $host = $parsedUrl['host'] ?? ''; // Extract the host (domain)

            // Mask the domain name (keep first 3 characters, replace the rest with '*')
            $maskedHost = substr($host, 0, 3) . str_repeat('*', max(0, strlen($host) - 3));

            // Rebuild the URL with the masked host
            return str_replace($host, $maskedHost, $url);
        }

        // Insert sample data
        DB::table('websites')->insert([
            [
                'user_id' => 1, // Assuming a user with ID 1 exists
                'name' => 'Example Website 1',
                'url' => 'https://example1.com',
                'masked_url' => generateMaskedUrl('https://example1.com'), // Generate masked URL
                'monthly_traffic' => 10000,
                'domain_rating' => 50,
                'domain_authority' => 40,
                'spam_score' => 1.23,
                'turnaround_time' => '24 hours',
                'price' => 100.50,
                'language' => 'English',
                'quality_score' => 8,
                'max_dofollow_links' => 5,
                'content_guidelines' => 'No spam, no adult content',
                'minimum_word_count' => 500,
                'allowed_link_types' => json_encode(['dofollow', 'nofollow']),
                'payment_methods' => json_encode(['PayPal', 'Credit Card']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Assuming a user with ID 2 exists
                'name' => 'Example Website 2',
                'url' => 'https://example2.com',
                'masked_url' => generateMaskedUrl('https://example2.com'), // Generate masked URL
                'monthly_traffic' => 20000,
                'domain_rating' => 60,
                'domain_authority' => 50,
                'spam_score' => 0.75,
                'turnaround_time' => '48 hours',
                'price' => 200.75,
                'language' => 'Spanish',
                'quality_score' => 9,
                'max_dofollow_links' => 10,
                'content_guidelines' => 'No gambling content',
                'minimum_word_count' => 1000,
                'allowed_link_types' => json_encode(['dofollow']),
                'payment_methods' => json_encode(['PayPal']),
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
