<?php

declare(strict_types=1);

namespace App\Models\Robot;

/**
 * Enumeration of robot types.
 */
enum Type: string
{
    /** @see https://www.agilox.net/produkt/agilox-one */
    case ONE = 'ONE';

    /** @see https://www.agilox.net/produkt/agilox-ocf */
    case OCF = 'OCF';

    /** @see https://www.agilox.net/produkt/agilox-odm */
    case ODM = 'ODM';
}
