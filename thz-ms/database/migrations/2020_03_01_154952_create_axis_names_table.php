<?php

declare(strict_types=1);

use App\Services\Database\DatabaseInserter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAxisNamesTable extends Migration
{
    public const TABLE = 'axis_names';

    private DatabaseInserter $inserter;

    /**
     * CreateAxisNamesTable constructor
     */
    public function __construct()
    {
        $this->inserter = app(DatabaseInserter::class);
    }

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE, static function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('y_axis');
            $table->string('x_axis');
            $table->timestamps();
        });

        $this->inserter->insertWithTimestamps(
            self::TABLE,
            [
                [
                    'y_axis' => 'Absorption coefficient, cm^-1',
                    'x_axis' => 'Frequency, THz',
                ],
                [
                    'y_axis' => 'THz signal, a.u.',
                    'x_axis' => 'Optical delay, ps',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE);
    }
}
