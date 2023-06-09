<?php

namespace App\Views\Components;

use Carbon\Carbon;
use DateTimeInterface;
use WireUi\View\Components\Input;
use WireUi\View\Components\TimePicker;

class MyDatetimePicker extends Input
{
    public bool $clearable;

    public bool $withoutTips;

    public bool $withoutTimezone;

    public bool $withoutTime;

    public int $interval;

    public string $timeFormat;

    public string $timezone;

    public ?string $userTimezone;

    public ?string $parseFormat;

    public ?string $displayFormat;

    public ?string $value;

    public ?Carbon $min;

    public ?Carbon $max;

    /**
     * @param Carbon|DateTimeInterface|string|int|null $min
     * @param Carbon|DateTimeInterface|string|int|null $max
     */
    public function __construct(
        bool $clearable = true,
        bool $borderless = false,
        bool $shadowless = false,
        bool $withoutTips = false,
        bool $withoutTimezone = false,
        bool $withoutTime = false,
        int $interval = TimePicker::INTERVAL,
        string $timeFormat = TimePicker::DEFAULT_FORMAT,
        ?string $parseFormat = null,
        ?string $displayFormat = null,
        ?string $rightIcon = 'calendar',
        ?string $timezone = null,
        ?string $userTimezone = null,
        ?string $label = null,
        ?string $hint = null,
        ?string $cornerHint = null,
        ?string $icon = null,
        ?string $prefix = null,
        ?string $prepend = null,
        ?string $value = null,
        $min = null,
        $max = null
    ) {
        parent::__construct($borderless, $shadowless, $label, $hint, $cornerHint, $icon, $rightIcon, $prefix, $suffix = null, $prepend, $append = null);

        $this->clearable = $clearable;
        $this->withoutTips = $withoutTips;
        $this->withoutTimezone = $withoutTimezone;
        $this->withoutTime = $withoutTime;
        $this->timeFormat = $timeFormat;
        $this->interval = $interval;
        $this->timezone = $timezone ?? config('app.timezone', 'UTC');
        $this->userTimezone = $userTimezone;
        $this->parseFormat = $parseFormat;
        $this->displayFormat = $displayFormat;
        $this->value = $value;
        $this->min = $min ? Carbon::parse($min) : null;
        $this->max = $max ? Carbon::parse($max) : null;
    }

    protected function getView(): string
    {
        return 'wireui::components.my-datetime-picker';
    }
}
