<?php include "prefix.php"?>
<header>Blockaded</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '14.' counter(item, decimal);} </style>
<p>A player&rsquo;s unit with <sc>Production</sc> is blockaded if it is in a system that does not contain any of their ships and contains other players&rsquo; ships.</p>
    <ol class="lrr">
	<li>A player cannot use a blockaded unit to produce ships; that player can still use a blockaded unit to produce ground forces.</li>
    <li>When a player blockades another player&rsquo;s space dock, if the blockaded player has captured any of the blockading player&rsquo;s units, those units are returned to the blockading player&rsquo;s reinforcements.</li>
    <ol><li>While a player is blockading another player, the blockaded player cannot capture any of the blockading player&rsquo;s units.</li></ol>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>While a player is involved in a space combat in a system, their units in that system are not blockaded, as both players will have ships in the system. Consequently, they may capture their opponent&rsquo;s units.</li>
    <ol><li>If that player has a unit in another system that their opponent is blockading, they will be unable to capture their opponent&rsquo;s units.</li></ol>
    <li>When a ship moves, it does not blockade units in systems it moves through.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_capture">Capture</a></li>
    <li><a href="/R_producing_units">Producing Units</a></li>
    <li><a href="/R_production">Production</a></li>
    <li><a href="/R_ships">Ships</a></li>
    <li><a href="/R_space_dock">Space Dock</a></li>
    </ul>
</article>
<?php include "suffix.php"?>