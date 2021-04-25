<?php include "prefix.php"?>
<header>Attach</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '12.' counter(item, decimal);} </style>
<p>Some game effects instruct a player to attach a card to a planet card. The attached card modifies that planet card in some way.</p>
    <ol class="lrr">
    <li>To attach a card to a planet card, a player places the card with the attach effect partially underneath the planet card.</li>
    <li>If a player gains or loses control of planet that contains a card with an attach effect, the attached card stays with that planet.</li>
    <ol>
        <li>The attached card maintains its exhausted or readied state.</li>
        <li>If a planet card is purged, also purge all cards that are attached to that planet card and remove the corresponding attachment tokens from the game board.</li>
    </ol>
    <li>When a card is attached to a planet card, place the corresponding attachment token on that planet on the game board.</li>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>There is no limit on how many attachments a single planet may have.</li>
    <li>The Custodians Token is not an attachment.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_agenda_card">Agenda Card</a></li>
    <li><a href="/R_control">Control</a></li>
    <li><a href="/R_exploration">Exploration</a></li>
    <li><a href="/R_planets">Planets</a></li>
    </ul>
</article>
<?php include "suffix.php"?>