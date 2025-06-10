<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_user_can_submit_a_valid_review()
    {
        $reviewData = [
            'rating' => 5,
            'message' => 'Pelayanannya sangat memuaskan dan kendaraannya dalam kondisi prima!',
        ];

        // Menggunakan URL '/reviews' yang sesuai dengan file web.php Anda
        $response = $this->post('/reviews', $reviewData);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Ulasan berhasil dikirim!');

        $this->assertDatabaseHas('reviews', [
            'rating' => 5,
            'message' => 'Pelayanannya sangat memuaskan dan kendaraannya dalam kondisi prima!',
        ]);
    }

    #[Test]
    public function review_submission_fails_if_message_is_missing()
    {
        $reviewData = [
            'rating' => 4,
            'message' => '', 
        ];

        $response = $this->post('/reviews', $reviewData);

        $response->assertSessionHasErrors('message');
        $this->assertDatabaseCount('reviews', 0);
    }

    #[Test]
    public function review_submission_fails_if_rating_is_out_of_range()
    {
        $reviewData = [
            'rating' => '', // Rating tidak valid
            'message' => 'Proses pemesanan mudah dan cepat..',
        ];

        // Menggunakan URL '/reviews'
        $response = $this->post('/reviews', $reviewData);

        $response->assertSessionHasErrors('rating');
        $this->assertDatabaseCount('reviews', 0);
    }
}
