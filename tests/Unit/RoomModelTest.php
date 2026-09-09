<?php

namespace Tests\Unit;

use App\Models\Room;
use PHPUnit\Framework\TestCase;

class RoomModelTest extends TestCase
{
    public function test_features_cast_to_array(): void
    {
        $room = new Room(['features' => ['wifi', 'tv']]);
        $this->assertSame(['wifi', 'tv'], $room->features);
    }

    public function test_price_per_night_is_numeric(): void
    {
        $room = new Room(['price_per_night' => 199.5]);
        $this->assertSame(199.5, (float) $room->price_per_night);
    }
}
