<?php include "prefix.php"?>
<header>Invasion</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '49.' counter(item, decimal);} </style>
<p>Invasion is a step of the tactical action during which the active player can land ground forces on planets to gain control of those planets.</p>
<p>To resolve an invasion, players perform the following steps:</p>
    <ol class="lrr">
    <li><b>Step 1 &ndash; Bombardment</b>: The active player may use the <sc>Bombardment</sc> ability of any of their units in the active system.</li>
    <li><b>Step 2 &ndash; Commit Ground Forces</b>: If the active player has ground forces in the space area of the active system, that player may commit any number of those ground forces to land on any of the planets in that system.</li>
    <ol>
        <li>To commit a ground force to a planet, the active player places that ground force unit on that planet.</li>
        <li>The planet may contain another player&rsquo;s ground forces.</li>
        <li>If the active player does not wish to commit ground forces, that player proceeds to the <b>Production</b> step of the tactical action.</li>
    </ol>
    <li><b>Step 3 &ndash; Space Cannon Defense</b>: If the active player commits any ground forces to a planet that contains units that have the <sc>Space Cannon</sc> ability, those <sc>Space Cannon</sc> abilities can be used against the committed ground forces.</li>
    <ol><li>If the active player committed ground forces to more than one planet that contained units with a <sc>Space Cannon</sc> ability, the active player chooses the order in which those <sc>Space Cannon</sc> abilities are resolved.</li></ol>
    <li><b>Step 4 &ndash; Ground Combat</b>: If the active player has ground forces on a planet in the active system that contains another player&rsquo;s ground forces, those players resolve a ground combat on that planet.</li>
    <ol><li>If players must resolve a combat on more than one planet, the active player chooses the order in which those combats are resolved.</li></ol>
    <li><b>Step 5 &ndash; Establish Control</b>: The active player gains control of each planet they committed ground forces to if that planet still contains at least one of their ground forces.</li>
    <ol>
        <li>When a player gains control of a planet, any structures on the planet that belong to other players are immediately destroyed.</li>
        <li>When a player gains control of a planet, they gain the planet card that matches that planet and exhaust that card.</li>
        <li>A player cannot gain control of a planet they already control.</li>
        <li>If there was a combat, and all units belonging to both players were destroyed, the player who was the defender retains control of the planet and places one of their control tokens on the planet.</li>
    </ol>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>Units are considered to be on the planet for game effects from the <b>Commit Ground Forces</b> step onward.</li>
    <li>If a player gains control of an uncontrolled planet during the <b>Establish Control</b> step, they explore it.</li>
    <li>If a player gains control of a legendary planet, they gain the legendary planet ability card in addition to the planet card. The ability card will not be exhausted if it was readied.</li>
    <li>If Mecatol Rex has the custodians token on it, a player must remove it before they may commit ground forces to it.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_active_player">Active Player</a></li>
    <li><a href="/R_bombardment">Bombardment</a></li>
    <li><a href="/R_combat">Combat</a></li>
    <li><a href="/R_control">Control</a></li>
    <li><a href="/R_custodians_token">Custodians Token</a></li>
    <li><a href="/R_exploration">Exploration</a></li>
    <li><a href="/R_ground_combat">Ground Combat</a></li>
    <li><a href="/R_ground_forces">Ground Forces</a></li>
    <li><a href="/R_planets">Planets</a></li>
    <li><a href="/R_space_cannon">Space Cannon</a></li>
    </ul>
</article>
<?php include "suffix.php"?>