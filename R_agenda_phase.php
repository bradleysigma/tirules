<?php include "prefix.php"?>
<header>Agenda Phase</header>
<article>
<h1>Rules Reference</h1>
<style> .lrr > li:before, .lrr > h2 > li:before {content: '8.' counter(item, decimal);} </style>
<p>During the agenda phase, players can cast votes on agendas that can change the rules of the game.</p>
    <ol class="lrr">
	<li>Players skip the agenda phase during the early portion of each game. After the custodians token is removed from Mecatol Rex, the agenda phase is added to each game round. To resolve the agenda phase, players perform the following steps:</li>
    <li><b>Step 1 &ndash; First Agenda</b>: Players resolve the first agenda by following these steps in order:</li>
    <ol class="roman">
    	<li><b>Reveal Agenda</b>: The speaker draws one agenda card from the top of the agenda deck and reads it aloud to all players, including all of its possible outcomes.</li>
    	<li><b>Vote</b>: Each player, starting with the player to the left of the speaker and continuing clockwise, can cast votes for an outcome of the current agenda.</li>
    	<li><b>Resolve Outcome</b>: Players tally each vote that was cast and resolve the outcome that received the most votes.</li>
    </ol>
    <li><b>Step 2 &ndash; Second Agenda</b>: Players repeat the <b>First Agenda</b> step of this phase for a second agenda.</li>
    <li><b>Step 3 &ndash; Ready Planets</b>: Each player readies each of their exhausted planets. Then, a new game round begins starting with the strategy phase.</li>
    <h2><li>Voting</li></h2>
    <p>When voting during the agenda phase, a player can cast votes for a specific outcome of an agenda.</p>
    <li>To cast votes, a player exhausts any number of their planets and chooses an outcome. The number of votes cast for that outcome is equal to the combined influence values of the planets that the player exhausts.</li>
    <ol><li>When a player exhausts a planet to cast votes, that player must cast the full amount of votes provided by that planet.</li></ol>
    <li>A player cannot cast votes for multiple outcomes of the same agenda. Each vote a player casts must be for the same outcome.</li>
    <li>Some agendas have &ldquo;For&rdquo; and &ldquo;Against&rdquo; outcomes. When a player casts votes on such an agenda, that player must cast their votes either &ldquo;For&rdquo; or &ldquo;Against&rdquo;.</li>
    <li>Some agendas instruct players to elect either a player or a planet. When a player casts votes for such an agenda, that player must cast their vote for an eligible player or planet as described on the agenda.</li>
    <li>When electing a player, a player can cast votes for themselves.</li>
    <ol><li>When resolving these agendas, the &ldquo;elected player&rdquo; is the player for whom the most votes are cast.</li></ol>
    <li>When electing a planet, a player must cast votes for a planet that is controlled by a player.</li>
    <ol><li>When resolving these agendas, the &ldquo;elected planet&rdquo; is the planet that had the most votes cast for it.</li></ol>
    <li>When casting votes, a player must declare aloud the outcome for which their votes are being cast.</li>
    <li>Trade goods cannot be spent to cast votes.</li>
    <li>A player may choose to abstain by not casting any votes.</li>
    <li>Some game effects allow a player to cast additional votes for an outcome. These votes cannot be cast for a different outcome than other votes cast by that player.</li>
    <li>If a player cannot vote on an agenda because of a game effect, that player cannot cast votes for that agenda by exhausting planets or through any other game effect.</li>
    <h2><li>Outcomes</li></h2>
    <li>To resolve an outcome, the speaker follows the instructions on the agenda card.</li>
    <li>If there is a tie for the outcome that received the most votes, or if no outcome receives any votes, the speaker decides which of the tied outcomes to resolve.</li>
    <ol><li>The speaker&rsquo;s decision is not a vote.</li></ol>
    <li>If an &ldquo;Elect&rdquo; or &ldquo;For&rdquo; outcome of a law was resolved, that card remains in play and permanently affects the game.</li>
    <li>If a directive or an &ldquo;Against&rdquo; outcome of a law was resolved, that card is placed in the agenda discard pile.</li>
    <li>Some game effects instruct a player to predict an outcome. To predict an outcome, a player declares aloud the outcome they think will receive the most votes. That player must make this prediction after the agenda is revealed but before any votes have been cast.</li>
    <ol>
    	<li>A predicted outcome must be a possible outcome of the revealed agenda.</li>
    	<li>After resolving the outcome of the agenda, any abilities that were dependent upon predicting the outcome are resolved.</li>
    </ol>
    </ol>

<h1>Notes</h1>
    <ol class="note">
    <li>A player cannot cast zero votes for an outcome. Casting zero votes is the same as abstaining.</li>
    <li>When a player casts votes during the agenda phase, it is not that player&rsquo;s turn for the purpose of game effects.</li>
    <li>If an agenda outcome affects multiple players, it does so in speaker order.</li>
    <li>Riders are resolved after the agenda is fully resolved, in speaker order.</li>
    <li>If a player successfully predicts multiple riders, they resolve one at a time, in the order that player chooses, with each other player having the opportunity to resolve an ability between each.</li>
    <li>Each pair of players may resolve one transaction during each agenda.</li>
    <li>Only planets ready at the end of the phase. Technologies and leaders do not.</li>
    <li>For notes about specific agenda cards, see the <a href="/C_agendas">agenda card component notes page</a>.</li>
    </ol>

<h1>Related Topics</h1>
    <ul>
    <li><a href="/R_agenda_card">Agenda Cards</a></li>
    <li><a href="/R_custodians_token">Custodians Token</a></li>
    <li><a href="/R_game_round">Game Round</a></li>
    <li><a href="/R_influence">Influence</a></li>
    <li><a href="/R_speaker">Speaker</a></li>
    <li><a href="/R_transactions">Transactions</a></li>
    </ul>
</article>
<?php include "suffix.php"?>