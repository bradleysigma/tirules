<?php include "prefix.php"?>
<header>Adjacency</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '6.' counter(item, decimal);} </style>
<p>Two system tiles are adjacent to each other if any of the tiles&rsquo; sides are touching each other.</p>
    <ol class="lrr">
    <li>A system that has a wormhole is treated as being adjacent to a system that has a matching wormhole.</li>
    <li>A unit or planet is adjacent to all system tiles that are adjacent to the system tile that contains that unit or planet.</li>
    <ol><li>A system is not adjacent to itself.</li></ol>
    <li>A planet is treated as being adjacent to the system that contains that planet.</li>
    <li>Systems that are connected by lines drawn across one or more hyperlane tiles are adjacent for all purposes.</li>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>A unit is not adjacent to the system it is in.</li>
    <li>The Wormhole Nexus and the Creuss home system are only adjacent to tiles via wormholes.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_game_board">Game Board</a></li>
    <li><a href="/R_hyperlanes">Hyperlanes</a></li>
    <li><a href="/R_movement">Movement</a></li>
    <li><a href="/R_neighbors">Neighbors</a></li>
    <li><a href="/R_pds">PDS</a></li>
    <li><a href="/R_system_tiles">System Tiles</a></li>
    <li><a href="/R_wormhole_nexus">Wormhole Nexus</a></li>
    <li><a href="/R_wormholes">Wormholes</a></li>
    </ul>
</article>
<?php include "suffix.php"?>