<?php include "prefix.php"?>
<header>Tactical Action</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '89.' counter(item, decimal);} </style>
<p>The tactical action is the primary method by which players produce units, move ships, and extend their dominion within the galaxy. To perform a tactical action, the active player performs the following steps:</p>
    <ol class="lrr">
    <li><b>Step 1 &ndash; Activation</b>: The active player must activate a system that does not contain one of their command tokens.</li>
    <ol>
    	<li>To activate a system, the active player places a command token from their tactic pool in that system. That system is the active system.</li>
    	<li>Other players&rsquo; command tokens do not prevent a player from activating a system.</li>
    </ol>
    <li><b>Step 2 &ndash; Movement</b>: The active player may move any number of ships that have a sufficient move value from any number of systems that do not contain one of their command tokens into the active system, following the rules for movement.</li>
    <ol>
    	<li>Ships that have capacity values can transport ground forces and fighters when moving.</li>
    	<li>The player may choose to not move any ships.</li>
    	<li>After the <b>Move Ships</b> step, all players can use the <sc>Space Cannon</sc> abilities of their units in the active system.</li>
    </ol>
    <li><b>Step 3 &ndash; Space Combat</b>: If two players have ships in the active system, those players must resolve a space combat.</li>
    <ol><li>If the active player is the only player with ships in the system, they skip this step.</li></ol>
    <li><b>Step 4 &ndash; Invasion</b>: The active player may use their <sc>Bombardment</sc> abilities, commit units to land on planets, and resolve ground combat against other players&rsquo; units.</li>
    <li><b>Step 5 &ndash; Production</b>: The active player may resolve each of their unit&rsquo;s <sc>Production</sc> abilities in the active system.</li>
    <ol><li>The active player may do this even if they did not move units or land ground forces during this tactical action.</li></ol>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>Each of these five steps happen during every tactical action, unless explicitly skipped; the active player does not have to choose between fighting a combat or producing units, for example.</li>
    <li>Any abilities that occur at the end of an action happen before any abilities that occur at the end of a player&rsquo;s turn.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_action_phase">Action Phase</a></li>
    <li><a href="/R_active_system">Active System</a></li>
    <li><a href="/R_command_sheet">Command Sheet</a></li>
    <li><a href="/R_command_tokens">Command Tokens</a></li>
    <li><a href="/R_invasion">Invasion</a></li>
    <li><a href="/R_movement">Movement</a></li>
    <li><a href="/R_producing_units">Producing Units</a></li>
    <li><a href="/R_production">Production</a></li>
    <li><a href="/R_space_combat">Space Combat</a></li>
    </ul>
</article>
<?php include "suffix.php"?>