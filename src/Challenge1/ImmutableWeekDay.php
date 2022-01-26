<?php

namespace Interview\Challenge1;

/*

Your job is to fill the class to cover all assertions. You can additionally look at test/Challenge1Test.php

$day1 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY);
$day2 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY);
$day3 = $day1->addDays(9);

assertFalse($day1->equals($day3));
assertTrue($day1->isOfValue(ImmutableWeekDay::FRIDAY));
assertFalse($day1->isOfValue(123));
assertTrue($day1->equals($day2));
assertTrue($day3->isOfValue(ImmutableWeekDay::SUNDAY));

assertException(\OutOfRangeException::class);
new ImmutableWeekDay(123);

*/
class ImmutableWeekDay
{
    public const SUNDAY    = 0;
    public const MONDAY    = 1;
    public const TUESDAY   = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY  = 4;
    public const FRIDAY    = 5;
    public const SATURDAY  = 6;

    /**
    * @var int
    */
    protected int $weekDay;

    /**
     * @throws \OutOfRangeException
     */
    public function __construct(int $value)
    {
        if (!$this->isValueValid($value)) {
            throw new \OutOfRangeException('Incorrect value');
        }
        $this->weekDay = $value;
    }

    /**
    * @return int
    */
    public function getWeekDay(): int
    {
        return $this->weekDay;
    }

    /**
    * @param int $value
    * @return ImmutableWeekDay
    */
    public function addDays(int $value): ImmutableWeekDay
    {
        $day = new ImmutableWeekDay($this->weekDay);
        for($i=1;$i<=$value;$i++) {
            $day->weekDay++;
            if ($day->weekDay >= 7) {
                $day->weekDay = 0;
            }
        }
        return $day;
    }

    /**
    * @param ImmutableWeekDay $day
    * @return bool
    */
    public function equals(ImmutableWeekDay $day): bool
    {
        return ($this->getWeekDay() === $day->getWeekDay());
    }

    /**
    * @param int $value
    * @return bool
    */
    public function isValueValid(int $value): bool
    {
        return (bool)($value >= 0 && $value <= 6); 
    }

    /**
    * @param int $value
    * @return bool
    */
    public function isOfValue(int $value): bool
    {
        return (bool)($value === $this->getWeekDay()); 
    }
}