<?php
/**
 * Copyright (c) 2018 - 2019 VectorNetworkProject. All rights reserved. MIT license.
 *
 * GitHub: https://github.com/VectorNetworkProject/TheMix
 * Website: https://www.vector-network.tk
 */

namespace VectorNetworkProject\TheMix\game\corepvp\red;

use pocketmine\Player;
use VectorNetworkProject\TheMix\game\corepvp\TeamManager;

class RedTeamManager extends TeamManager
{
    /** @var array $list */
    private static $list = [];

    public static function addList(Player $player): void
    {
        if (!self::isJoined($player)) {
            self::$list[$player->getName()] = $player->getName();
        }
    }

    /**
     * @param Player $player
     */
    public static function removeList(Player $player): void
    {
        if (self::isJoined($player)) {
            unset(self::$list[$player->getName()]);
        }
    }

    /**
     * @param Player $player
     *
     * @return bool
     */
    public static function isJoined(Player $player): bool
    {
        return isset(self::$list[$player->getName()]) ? true : false;
    }

    /**
     * @return array
     */
    public static function getList(): array
    {
        return self::$list;
    }

    /**
     * @return int
     */
    public static function getListCount(): int
    {
        return count(self::$list);
    }

    /**
     * @return void
     */
    public static function ClearList(): void
    {
        self::$list = [];
    }
}
