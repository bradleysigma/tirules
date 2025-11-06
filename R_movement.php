<?php include "prefix.php"?>
<header>Movement</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '58.' counter(item, decimal);} </style>
<style> .lrr {counter-reset: item 1; }</style>
<p>A player can move their ships by resolving a tactical action during the action phase. Additionally, some abilities can move a unit outside of the tactical action.</p>
    <ol class="lrr">
    <h2><li>Tactical Action Movement</li></h2>
    <li>A ship&rsquo;s move value is presented along with its other attributes on faction sheets and unit upgrade technology cards. This value indicates the distance from its current system that a ship can move.</li>
    <p>To resolve movement, players perform the following steps:</p>
    <li><b>Step 1 &ndash; Move Ships</b>: A player can move any number of their eligible ships into the active system, obeying the following rules:</li>
    <ol>
        <li>The ship must end its movement in the active system.</li>
        <li>The ship cannot move through a system that contains ships that are controlled by another player.</li>
        <li>The ship <b>cannot</b> move if it started its movement in another system that contains one of its faction&rsquo;s command tokens.</li>
        <li>The ship <b>can</b> move through systems that contain its own faction&rsquo;s command tokens.</li>
        <li>The ship <b>can</b> move out of the <b>active</b> system and back into it if its move value is high enough.</li>
        <li>The ship must move along a path of adjacent systems, and the number of systems the ship enters cannot exceed its move value.</li>
    </ol>
    <li>When a ship with a capacity value moves or is moved, it may transport ground forces and fighters.</li>
    <li>The active player declares which of their ships are moving before any ships move. Those ships arrive in the active system simultaneously.</li>
    <li><b>Step 2 &ndash; Space Cannon Offense</b>: After the <b>Move Ships</b> step, players can use the <sc>Space Cannon</sc> abilities of their units in the active system.</li>
    <h2><li>Ability Movement</li></h2>
    <li>If an ability moves a unit outside of the <b>Movement</b> step of a tactical action, players follow the rules specified by that ability; neither a unit&rsquo;s move value nor the rules specified above apply.</li>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>When an effect moves a unit to an adjacent system, modifying that unit&rsquo;s move value will have no effect.</li>
    <li>An ability may move a player&rsquo;s ship out of a system containing one of the player&rsquo;s faction&rsquo;s command tokens. However, the transport rules prevent a player&rsquo;s units from being transported from systems containing one of that player&rsquo;s command tokens, other than the active system. An ability that moves a player&rsquo;s ship must also explicitly allow it to transport units from non&ndash;active systems containing that player&rsquo;s faction&rsquo;s command token for it to be able to do so.</li>
    <ol><li>During a retreat, units may be transported from the active system.</li></ol>
    <li>A ship that can both move and be transported (i.e. Fighter II) cannot do both by &ldquo;meeting&rdquo; a ship with capacity partway through a tactical action movement, as all movement is simultaneous.</li>
    <li>Ships only move &ldquo;into&rdquo; the destination system. A ship may move &ldquo;through&rdquo; other systems.</li>
    <li>Fighters alone will block other player&rsquo;s ships from moving through that system, whether they are accompanied by a Space Dock or they are Fighters II.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_active_system">Active System</a></li>
    <li><a href="/R_adjacency">Adjacency</a></li>
    <li><a href="/R_anomalies">Anomalies</a></li>
    <li><a href="/R_capacity">Capacity</a></li>
    <li><a href="/R_hyperlanes">Hyperlanes</a></li>
    <li><a href="/R_move">Move</a></li>
    <li><a href="/R_ships">Ships</a></li>
    <li><a href="/R_space_cannon">Space Cannon</a></li>
    <li><a href="/R_tactical_action">Tactical Action</a></li>
    <li><a href="/R_transport">Transport</a></li>
    <li><a href="/R_wormholes">Wormholes</a></li>
    </ul>
</article>
<?php include "suffix.php"?>
