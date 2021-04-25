<?php include "prefix.php"?>
<header>Space Combat</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '78.' counter(item, decimal);} </style>
<p>After resolving the <b>Space Cannon Offense</b> step of a tactical action, if two players have ships in the active system, those players must resolve a space combat.</p>
    <ol class="lrr">
    <li>If the active player is the only player with ships in the system, they skip the <b>Space Combat</b> step of the tactical action and proceeds to the <b>Invasion</b> step.</li>
    <li>If an ability occurs &ldquo;before combat&rdquo;, it occurs immediately before the <b>Anti&ndash;Fighter Barrage</b> step.</li>
    <ol>
        <li>During the first round of a combat, &ldquo;start of combat&rdquo; and &ldquo;start of combat round&rdquo; effects occur during the same timing window.</li>
        <li>During the last round of a combat, &ldquo;end of combat&rdquo; and &ldquo;end of combat round&rdquo; effects occur during the same timing window.</li>
    </ol>
    <p>To resolve a space combat, players perform the following steps:</p>
    <li><b>Step 1 &ndash; Anti&ndash;Fighter Barrage</b>: If this is the first round of a space combat, the players may simultaneously use the <sc>Anti&ndash;Fighter Barrage</sc> ability of any of their units in the active system.</li>
    <ol>
        <li>If one or both players no longer have ships in the active system after resolving this step, the space combat ends immediately.</li>
        <li>Players cannot resolve <sc>Anti&ndash;Fighter Barrage</sc> abilities during any rounds of space combat other than the first round.</li>
        <li>This step still occurs if no fighters are present.</li>
    </ol>
    <li><b>Step 2 &ndash; Announce Retreats</b>: Each player may announce a retreat, beginning with the defender.</li>
    <ol>
        <li>A retreat will not occur immediately; the units retreat during the <b>Retreat</b> step.</li>
        <li>If the defender announces a retreat, the attacker cannot announce a retreat during that combat round.</li>
        <li>A player cannot announce a retreat if there is not at least one eligible system to retreat to.</li>
    </ol>
    <li><b>Step 3 &ndash; Roll Dice</b>: Each player rolls one die for each ship they have in the active system; this is called a combat roll. If a unit&rsquo;s combat roll produces a result that is equal to or greater than that unit&rsquo;s combat value, that result produces a hit.</li>
    <ol>
        <li>If a unit&rsquo;s combat value contains two or more burst icons, the player rolls one die for each burst icon instead.</li>
        <li>If a player has ships that have different combat values in the active system, that player rolls these dice separately.</li>
        <li>First, that player should roll all dice for units with a combat value of &ldquo;1&rdquo;. Then, that player should roll all dice for units with combat value of &ldquo;2&rdquo;, and then &ldquo;3&rdquo;, continuing in numerical order until that player has rolled dice for each of their ships.</li>
        <li>The player counts each hit their combat rolls produce. The total number of hits produced will destroy units during the <b>Assign Hits</b> step.</li>
        <li>If a player has an ability that rerolls a die or affects a die after it is rolled, that player must resolve such an ability immediately after rolling all of their dice.</li>
        <li>The attacker makes all of their combat rolls during this step before the defender. This procedure is important for abilities that allow a player to reroll an opponent&rsquo;s die.</li>
    </ol>
    <li><b>Step 4 &ndash; Assign Hits</b>: Each player in the combat must choose and destroy one of their own ships in the active system for each hit their opponent produced.</li>
    <ol>
        <li>Before assigning hits, players may use their units&rsquo; <sc>Sustain Damage</sc> abilities to cancel hits.</li>
        <li>When a unit is destroyed, the player who controls that unit removes it from the board and places it in their reinforcements.</li>
    </ol>
    <li><b>Step 5 &ndash; Retreat</b>: If a player announced a retreat during <b>step 2</b>, and there is still an eligible system for their units to retreat to, they must retreat.</li>
    <ol>
        <li>If a player announced a retreat during the <b>Announce Retreats</b> step, but their opponent has no ships remaining in the system, the combat immediately ends and the retreat does not occur.</li>
        <li>To retreat, a player takes all of their ships with a move value in the combat and moves them to a single system that is adjacent to the active system. That player&rsquo;s fighters and ground forces in the space area of the active system that are unable to move or be transported are removed.</li>
        <li>The system that a player&rsquo;s units retreat to must contain one or more of that player&rsquo;s units, a planet they control, or both. Additionally, the system cannot contain ships controlled by another player.</li>
        <li>If any of a player&rsquo;s units successfully retreat and are moved into an adjacent system, that player must place a command token from their reinforcements in the system to which their units retreated. If that system already contains one of their command tokens, that player does not place an additional token there. If the player has no command tokens in their reinforcements, that player must use one from their command sheet instead.</li>
    </ol>
    <li>After the <b>Retreat</b> step, if both players still have ships in the active system, those players resolve another round of space combat beginning with the <b>Announce Retreats</b> step.</li>
    <li>Space combat ends when only one player &ndash; or neither player &ndash; has a ship in the space area of the active system.</li>
    <ol><li>During the last round of a combat, &ldquo;end of combat&rdquo; and &ldquo;end of combat round&rdquo; effects occur during the same timing window.</li></ol>
    <li>After a combat ends, the player with one or more ships remaining in the system is the winner of the combat; the other player is the loser of the combat. If neither player has a ship remaining, the combat ends in a draw and there is no winner.</li>
    <ol><li>If the winner of the combat has fighters or ground forces in the space area of the active system and those units exceed the capacity of that player&rsquo;s ships in that system, that player must choose and remove any excess units.</li></ol>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>A player&rsquo;s fighters and ground forces do not count against capacity during combat. At the end of combat, any excess units are removed and returned to that player&rsquo;s reinforcements.</li>
    <li>A player may retreat into an asteroid field only if that player owns the <i>Antimass Deflectors</i> technology.</li>
    <li>A player may retreat into a supernova only if that player owns the <i>Magmus Reactor</i> Muaat factional technology.</li>
    <li>A player cannot retreat into a nebula.</li>
    <ol>
        <li>The Empyrean player may retreat into a nebula.</li>
        <li>The <i>Shared Research</i> law will not allow a player to retreat into a nebula.</li>
    </ol>
    <li>A player may attempt to retreat from a combat in a gravity rift, but will still be affected by it. See the <a href="/R_gravity_rift">gravity rift page</a> for more details.</li>
    <li>The <i>Nav Suite</i> action card will not allow a player ignore an anomaly while retreating.</li>
    <li>The <i>Dark Energy Tap</i> technology allows a player to retreat into a system that does not contain their ships or a planet they control.</li>
    <li>Modifying the move value of a ship will have no effect when retreating. Retreats are limited to adjacent systems.</li>
    <li>While retreating, a player cannot transport more fighters and/or ground forces than they have in the retreating ships.</li>
    <li>Capacity is checked after the winner of a space combat is determined. As such, it is possible to win a space combat with only fighters remaining, before removing those fighters due to lack of capacity.</li>
    <li>The &ldquo;0&rdquo; side of the d10 represents a result of 10.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_anti_fighter_barrage">Anti&ndash;Fighter Barrage</a></li>
    <li><a href="/R_attacker">Attacker</a></li>
    <li><a href="/R_capacity">Capacity</a></li>
    <li><a href="/R_defender">Defender</a></li>
    <li><a href="/R_destroyed">Destroyed</a></li>
    <li><a href="/R_fleet_pool">Fleet Pool</a></li>
    <li><a href="/R_opponent">Opponent</a></li>
    <li><a href="/R_sustain_damage">Sustain Damage</a></li>
    <li><a href="/R_tactical_action">Tactical Action</a></li>
    </ul>
</article>
<?php include "suffix.php"?>
