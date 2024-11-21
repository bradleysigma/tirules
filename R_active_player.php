<?php include "prefix.php"?>
<header>Active Player</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '4.' counter(item, decimal);} </style>
<p>The active player is the player taking a turn during the action phase.</p>
    <ol class="lrr">
    <li>During the action phase, the player who is first in initiative order is the first active player.</li>
    <li>After the active player takes a turn, the next player in initiative order becomes the active player.</li>
    <li>After the last player in initiative order takes a turn, the player who is first in initiative order becomes the active player again, and turns begin again in initiative order, ignoring any players who have already passed.</li>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>During the strategy, status and agenda phases, no player is the active player.</li>
    <li>During combat, the active player is the attacker.</li>
    <li>The active player will have the first opportunity to resolve abilities during each timing window.</li>
    <li>All transactions during the action phase must involve the active player.</li>
    <li>If a non&ndash;active player produces hits using the <sc>Space Cannon Offense</sc> ability of one of their units, those hits must be assigned to the active player&rsquo;s units.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_abilities">Abilities</a></li>
    <li><a href="/R_action_phase">Action Phase</a></li>
    <li><a href="/R_attacker">Attacker</a></li>
    <li><a href="/R_initiative_order">Initiative Order</a></li>
    <li><a href="/R_space_cannon">Space Cannon</a></li>
    </ul>
</article>
<?php include "suffix.php"?>