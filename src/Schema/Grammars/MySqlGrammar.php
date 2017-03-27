<?php
namespace Grimzy\LaravelSpatial\Schema\Grammars;

use Grimzy\LaravelSpatial\Schema\Blueprint;
use Illuminate\Support\Fluent;

class MySqlGrammar extends \Illuminate\Database\Schema\Grammars\MySqlGrammar
{
    /**
     * Adds a statement to add a geometry column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typeGeometry(Fluent $column)
    {
        return 'GEOMETRY';
    }

    /**
     * Adds a statement to add a point column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typePoint(Fluent $column)
    {
        return 'POINT';
    }

    /**
     * Adds a statement to add a linestring column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typeLinestring(Fluent $column)
    {
        return 'LINESTRING';
    }

    /**
     * Adds a statement to add a polygon column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typePolygon(Fluent $column)
    {
        return 'POLYGON';
    }

    /**
     * Adds a statement to add a multipoint column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typeMultipoint(Fluent $column)
    {
        return 'MULTIPOINT';
    }

    /**
     * Adds a statement to add a multilinestring column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typeMultilinestring(Fluent $column)
    {
        return 'MULTILINESTRING';
    }

    /**
     * Adds a statement to add a multipolygon column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typeMultipolygon(Fluent $column)
    {
        return 'MULTIPOLYGON';
    }

    /**
     * Adds a statement to add a geometrycollection column
     *
     * @param \Illuminate\Support\Fluent $column
     * @return string
     */
    public function typeGeometrycollection(Fluent $column)
    {
        return 'GEOMETRYCOLLECTION';
    }

    /**
     * Compile a spatial index key command.
     *
     * @param  \Grimzy\LaravelSpatial\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileSpatial(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileKey($blueprint, $command, 'spatial');
    }

    /**
     * Compile a drop index command.
     *
     * @param  \Grimzy\LaravelSpatial\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropSpatial(Blueprint $blueprint, Fluent $command)
    {
        $table = $this->wrapTable($blueprint);

        $index = $this->wrap($command->index);

        return "alter table {$table} drop index {$index}";
    }
}
