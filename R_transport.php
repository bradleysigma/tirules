<?php include "prefix.php"?>
<header>Transport</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '95.' counter(item, decimal);} </style>
<p>When a ship moves, it may transport any combination of fighters and ground forces, but the number of units it transports cannot exceed that ship&rsquo;s capacity value.</p>
    <ol class="lrr">
	<li>The ship can pick up and transport fighters and ground forces when it moves. During a tactical action, it can pick up and transport units from the active system, the system it started its movement in, and each system it moves through.</li>
    <ol>
    	<li>These transported units remain with the transporting ship until it is finished moving.</li>
    	<li>Units being transported by a ship that is removed from the board by a gravity rift are also removed from the board.</li>
    </ol>
    <li>Any fighters and ground forces that a ship transports must move with the ship and remain in the space area of a system.</li>
    <li>Fighters and ground forces cannot be picked up from a system that contains one of their faction&rsquo;s command tokens other than the active system.</li>
    <li>A player can land ground forces on a planet in a system during the <b>Invasion</b> step of a tactical action.</li>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>A ship that can both move and be transported (i.e. Fighter II) cannot do both by &ldquo;meeting&rdquo; a ship with capacity partway though a tactical action movement, as all movement is simultaneous.</li>
    <li>A ship may transport as it retreats or is otherwise moved out of the active system, as the units it transports will be picked up from the active system.</li>
    <li>A ship may pick up ground forces from a planet in the active system, usually to invade a different planet in the same system.</li>
    <li>A ship cannot pick up more units from a planet than it has capacity. However, a ship may pick up any units (including none) in a system as it transports, even if doing so would cause units to be removed due to capacity limits.</li>
    <ol>
    	<li>For example, say a carrier (with capacity 4) is in the space area of a system along with four fighters. On the only planet in that system are eight infantry. There are no other units in the system. When the carrier moves out of the system, it obeys the following:</li>
        <li>The carrier may transport the four fighters, leaving behind all eight of the infantry in the system.</li>
        <li>The carrier may transport four of the eight infantry, leaving behind the four remaining infantry in the system. Now that the system has zero capacity, all four of the fighters will be removed.</li>
        <li>The carrier may transport two of the eight infantry and two of the four fighters, leaving behind the six remaining infantry in the system. Now that the system has zero capacity, the two remaining fighters will be removed.</li>
        <li>The carrier may transport nothing, leaving behind all eight of the infantry in the system. Now that the system has zero capacity, all four of the fighters will be removed.</li>
        <li>The carrier cannot attempt to pick up all eight infantry, even if it immediately removes four of them (and the fighters).</li>
    </ol>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_capacity">Capacity</a></li>
    <li><a href="/R_ground_forces">Ground Forces</a></li>
    <li><a href="/R_movement">Movement</a></li>
    </ul>
</article>
<?php include "suffix.php"?>