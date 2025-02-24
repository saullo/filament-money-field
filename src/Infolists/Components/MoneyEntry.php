<?php

namespace Pelmered\FilamentMoneyField\Infolists\Components;

use Filament\Infolists\Components\TextEntry;
use Pelmered\FilamentMoneyField\hasMoneyAttributes;
use Pelmered\FilamentMoneyField\MoneyFormatter;

class MoneyEntry extends TextEntry
{
    use hasMoneyAttributes;

    protected function setUp(): void
    {
        parent::setUp();

        $this->isMoney = true;
        $this->numeric();

        $this->formatStateUsing(static function (MoneyEntry $component, $state): ?string {
            $currency = $component->getCurrency();
            $locale   = $component->getLocale();

            return MoneyFormatter::format($state, $currency, $locale);
        });
    }
}
