<?php include "prefix.php"?>
<header>Capacity <sub>(Attribute)</sub></header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '16.' counter(item, decimal);} </style>
<p>Capacity is an attribute of some units that is presented on faction sheets and unit upgrade technology cards.</p>
    <ol class="lrr">
    <li>A unit&rsquo;s capacity value indicates the maximum combined number of fighters and ground forces that it can transport.</li>
    <li>The combined capacity values of a player&rsquo;s ships in a system determine the number of fighters and ground forces that player can have in that system&rsquo;s space area.</li>
    <li>If a player has more fighters and ground forces in the space area of a system than the total capacity of that player&rsquo;s ships in that system, that player must remove the excess units.</li>
    <ol>
        <li>A player can choose which of their excess units to remove.</li>
        <li>Ground forces on planets do not count against capacity.</li>
        <li>A player&rsquo;s fighters and ground forces do not count against capacity during combat. At the end of combat, any excess units are removed and returned to that player&rsquo;s reinforcements.</li>
    </ol>
    <li>Fighters and ground forces are not assigned to specific ships, except while they are being transported.</li>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>If a player moves more fighters and/or ground forces into a system containing another player&rsquo;s ships, capacity limits must be met before proceeding to the <b>Space Cannon Offense</b> substep or the <b>Space Combat</b> step.</li>
    <li>If a ship with capacity is destroyed during the <b>Space Cannon Offense</b> step, capacity limits must be met before space combat starts.</li>
    <li>Capacity is checked after the winner of a space combat is determined. As such, it is possible to win a space combat with only fighters remaining, before removing those fighters due to lack of capacity.</li>
    <li>A ship cannot pick up more units from a planet than it has capacity. However, a ship may pick up any units (including zero) in a system as it transports, even if doing so would cause units to be removed due to capacity limits.</li>
    <ol>
        <li>For example, say a carrier (with capacity four) is in the space area of a system along with four fighters. On the only planet in that system are eight infantry. There are no other units in the system. When the carrier moves out of the system, it obeys the following:</li>
        <li>The carrier may transport the four fighters, leaving behind all eight of the infantry in the system.</li>
        <li>The carrier may transport four of the eight infantry, leaving behind the four remaining infantry in the system. Now that the system has zero capacity, all four of the fighters will be removed.</li>
        <li>The carrier may transport two of the eight infantry and two of the four fighters, leaving behind the six remaining infantry in the system. Now that the system has zero capacity, the two remaining fighters will be removed.</li>
        <li>The carrier may transport nothing, leaving behind all eight of the infantry in the system. Now that the system has zero capacity, all four of the fighters will be removed.</li>
        <li>The carrier cannot attempt to pick up all eight infantry, even if it immediately removes four of them (and the fighters).</li>
    </ol>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_fleet_pool">Fleet Pool</a></li>
    <li><a href="/R_movement">Movement</a></li>
    <li><a href="/R_space_combat">Space Combat</a></li>
    <li><a href="/R_transport">Transport</a></li>
    </ul>
</article>
<?php include "suffix.php"?>