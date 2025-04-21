'use strict';
const MANIFEST = 'flutter-app-manifest';
const TEMP = 'flutter-temp-cache';
const CACHE_NAME = 'flutter-app-cache';

const RESOURCES = {"assets/AssetManifest.bin": "d945f28716feccceb9bd8a8710d60b45",
"assets/AssetManifest.bin.json": "85c2efdd2318569db34c5d3784367d49",
"assets/AssetManifest.json": "85ec49d91c0a09d6442ba764ab4b23c7",
"assets/assets/rules/component_notes/action_cards.yaml": "e52eb4e58ebf91a3de176dc50fc01890",
"assets/assets/rules/component_notes/agendas.yaml": "33f6dd5e9f185195ee861642c0044ae8",
"assets/assets/rules/component_notes/exploration_cards.yaml": "fe3f092fda909b4daf7e260e1ec26e75",
"assets/assets/rules/component_notes/objectives.yaml": "5dc790325f48e706251b006404d8b223",
"assets/assets/rules/component_notes/promissory_notes.yaml": "f813f94bc1026d396365c5c8a171f6d5",
"assets/assets/rules/component_notes/relics.yaml": "92983373dbd49b86752f1394523d4840",
"assets/assets/rules/component_notes/technology.yaml": "26cf6260a0465e3b4d1bcdfa5c8df850",
"assets/assets/rules/component_notes/units.yaml": "056718fe4d7bdfcba49250907c8f2054",
"assets/assets/rules/faction_notes/sardakk_n%25E2%2580%2599orr.yaml": "6a244e3b53c553508cb12b7cae170da9",
"assets/assets/rules/faction_notes/the_arborec.yaml": "3b6dea74541d7683cf32d1222778ab26",
"assets/assets/rules/faction_notes/the_argent_flight.yaml": "7786c933730f7478adb6c46b72b357a0",
"assets/assets/rules/faction_notes/the_barony_of_letnev.yaml": "e6d026c79c34efd5389dab520bedfd2d",
"assets/assets/rules/faction_notes/the_clan_of_saar.yaml": "dae3e0327db8a6f461c790cdad2ec893",
"assets/assets/rules/faction_notes/the_council_keleres.yaml": "fc41fbdbc1e0f2820dab5178df34b93b",
"assets/assets/rules/faction_notes/the_embers_of_muaat.yaml": "06c81c40857c6a4e0bc8a297a48ebc64",
"assets/assets/rules/faction_notes/the_emirates_of_hacan.yaml": "5e1ca6ba817f608a030fca16e3804b5e",
"assets/assets/rules/faction_notes/the_empyrean.yaml": "0b44e18f19b3747b0ccaa0eb171c7e56",
"assets/assets/rules/faction_notes/the_federation_of_sol.yaml": "03ff10cd7c54d67b150519ab302cc194",
"assets/assets/rules/faction_notes/the_ghosts_of_creuss.yaml": "44c9ba281969b7aa3223320017fe5ec2",
"assets/assets/rules/faction_notes/the_l1z1x_mindnet.yaml": "ff9018f995067f03d04176e7a945d090",
"assets/assets/rules/faction_notes/the_mahact_gene%25E2%2580%2593sorcerers.yaml": "6c6dbbab4ed57aa2f08e5219c8dd2bca",
"assets/assets/rules/faction_notes/the_mentak_coalition.yaml": "968f01581df07759b26c6b01977b7591",
"assets/assets/rules/faction_notes/the_naalu_collective.yaml": "88c0de934020ba05746031c56b1ff9a6",
"assets/assets/rules/faction_notes/the_naaz%25E2%2580%2593rokha_alliance.yaml": "de8e443d7bea3bbb362511f3a4eae215",
"assets/assets/rules/faction_notes/the_nekro_virus.yaml": "edfd72827acbe53f5255591822a1aa6d",
"assets/assets/rules/faction_notes/the_nomad.yaml": "a78e602d0f8305268168a56703159493",
"assets/assets/rules/faction_notes/the_titans_of_ul.yaml": "3ed1ab52f797d414a0d798d83aca78ac",
"assets/assets/rules/faction_notes/the_universities_of_jol%25E2%2580%2593nar.yaml": "51b8cc6142fc6da82d8afd39151d2648",
"assets/assets/rules/faction_notes/the_vuil%25E2%2580%2599raith_cabal.yaml": "339b1429c9c50422022446df1c0ae8af",
"assets/assets/rules/faction_notes/the_winnu.yaml": "7975988ed387f58ed934693e5dcbbd76",
"assets/assets/rules/faction_notes/the_xxcha_kingdom.yaml": "1a963f5c426858699a0c2b57a52625c9",
"assets/assets/rules/faction_notes/the_yin_brotherhood.yaml": "3e4cea38e2e01e6c5fbffb40e598159a",
"assets/assets/rules/faction_notes/the_yssaril_tribes.yaml": "b5ee0bb55dc640c0c2fec99ab4487ab1",
"assets/assets/rules/root.yaml": "adf0bc0a0b28b935c6a525166db5061d",
"assets/assets/rules/rule_topics/abilities.yaml": "9d5ff0bf3deb473bf81d003bb86f5e41",
"assets/assets/rules/rule_topics/action_cards.yaml": "457ef5a28dfd7fc144c529b38926e9fb",
"assets/assets/rules/rule_topics/action_phase.yaml": "ccdaa298c11990db582bce1e3e99e3dc",
"assets/assets/rules/rule_topics/active_player.yaml": "825f4ee0c5ddd2bcdd0b2985e4c878b0",
"assets/assets/rules/rule_topics/active_system.yaml": "a3622360cb167853f0be1dcbe07bfe80",
"assets/assets/rules/rule_topics/adjacency.yaml": "bfed854d055db9156a76f720fe1fbdfb",
"assets/assets/rules/rule_topics/agenda_card.yaml": "16b0fb94a53a9e8d6baab676939baaf2",
"assets/assets/rules/rule_topics/agenda_phase.yaml": "754668d09c27635079fcbb2fa88201ad",
"assets/assets/rules/rule_topics/anomalies.yaml": "7a0b1b8820577dee9683bf77451c5ca6",
"assets/assets/rules/rule_topics/anti%25E2%2580%2593fighter_barrage.yaml": "db1a3c816e19e7cc867a088a5303b01d",
"assets/assets/rules/rule_topics/asteroid_field.yaml": "5291e9014381235982c118eba142273f",
"assets/assets/rules/rule_topics/attach.yaml": "b2190ee44394cd3ef3df69c90c5d3ba6",
"assets/assets/rules/rule_topics/attacker.yaml": "d04cb03347fc341bb2686eb4dfca0123",
"assets/assets/rules/rule_topics/blockaded.yaml": "5dc9aaa215b4b4080d8e86ef23bddb98",
"assets/assets/rules/rule_topics/bombardment.yaml": "d4757cfa431546c1433e8280de3c717f",
"assets/assets/rules/rule_topics/capacity.yaml": "08f437032150215bf62f96fb234db123",
"assets/assets/rules/rule_topics/capture.yaml": "d547f969dc1aae128207484c5cc02782",
"assets/assets/rules/rule_topics/combat.yaml": "fc2bdf80e8331402522a144e0f035fc3",
"assets/assets/rules/rule_topics/command_sheet.yaml": "3608cd0fce3530c26c2be0b928908956",
"assets/assets/rules/rule_topics/command_tokens.yaml": "843b587619f7418a7ed22088ea14bfbd",
"assets/assets/rules/rule_topics/commodities.yaml": "fb7cb87c85f95981a357fcb536d589c0",
"assets/assets/rules/rule_topics/component_action.yaml": "d23e3de5cd90d51ae9333c7a93e29de4",
"assets/assets/rules/rule_topics/component_limitations.yaml": "3d3a4d5464ede3dfc115136839d33e35",
"assets/assets/rules/rule_topics/construction.yaml": "fdbe5459a7938a2671ff626630afb722",
"assets/assets/rules/rule_topics/control.yaml": "39a2a6cc38523d3f4e290f3d7a0d0c2f",
"assets/assets/rules/rule_topics/cost.yaml": "e167db76898d19af69ce7800a7871d25",
"assets/assets/rules/rule_topics/custodians_token.yaml": "392e0384069b1a6f7555ae126775545d",
"assets/assets/rules/rule_topics/deals.yaml": "bf388586bef26250f008a4df95d03a49",
"assets/assets/rules/rule_topics/defender.yaml": "87c731c336834b6825e9e30bcc94951f",
"assets/assets/rules/rule_topics/deploy.yaml": "1d212a0e235db869b7c8d0dabb007e18",
"assets/assets/rules/rule_topics/destroyed.yaml": "fe0290be39d9229f7fda3e0479030871",
"assets/assets/rules/rule_topics/diplomacy.yaml": "82d8cb4231ae05320bc4aaec4343a98c",
"assets/assets/rules/rule_topics/elimination.yaml": "89e3944f1d5a8eb4902c3d820240065e",
"assets/assets/rules/rule_topics/exhausted.yaml": "83b3ead9c0dd7f56c29f06836016028b",
"assets/assets/rules/rule_topics/exploration.yaml": "e8b92ae5af78fd96c0899b524e149490",
"assets/assets/rules/rule_topics/fighter_tokens.yaml": "fdaf6528c47ab244dcf05eadf70ca2d2",
"assets/assets/rules/rule_topics/fleet_pool.yaml": "b53c8fd7676d633df35b58c4a6ad9c88",
"assets/assets/rules/rule_topics/frontier_tokens.yaml": "a48e3a10ace979e13846a240e39f8f69",
"assets/assets/rules/rule_topics/game_board.yaml": "e4be6fa6a91aa160fb0cef5c40818c5f",
"assets/assets/rules/rule_topics/game_round.yaml": "9e4c3218f5671c08213c48bc0c29c2f0",
"assets/assets/rules/rule_topics/gravity_rift.yaml": "4d56a1611610ef8f11eae4841f5b4546",
"assets/assets/rules/rule_topics/ground_combat.yaml": "b03e7a082537fa3886ead47c60fdc9a7",
"assets/assets/rules/rule_topics/ground_forces.yaml": "f0d7aaf194f7edabc001940dfb84a3a7",
"assets/assets/rules/rule_topics/hyperlanes.yaml": "22196e2e16d49f1db0b5ed36d23f82b7",
"assets/assets/rules/rule_topics/imperial.yaml": "3307fc330211d77340cccf4b42e828ec",
"assets/assets/rules/rule_topics/infantry_tokens.yaml": "a5c101e2fb82194df0d6be61a826245a",
"assets/assets/rules/rule_topics/influence.yaml": "96236647a529b1b1a103ad8918197e26",
"assets/assets/rules/rule_topics/initiative_order.yaml": "03be956d3750eaff8e58447e0b35b409",
"assets/assets/rules/rule_topics/invasion.yaml": "69ff3e1465473a7f848a0ec4862a5155",
"assets/assets/rules/rule_topics/leaders.yaml": "f443b8472f4a4856a1eef020edcd0ae9",
"assets/assets/rules/rule_topics/leadership.yaml": "9a594a6c12f5d49a8f29698a5a0d2e28",
"assets/assets/rules/rule_topics/leader_sheet.yaml": "845911ed321ee869627c511a45e06a40",
"assets/assets/rules/rule_topics/legendary_planets.yaml": "0020162f51e2fff21cb6901f2af8510e",
"assets/assets/rules/rule_topics/mecatol_rex.yaml": "5a81585cc8929772dfc5c4128a03ff32",
"assets/assets/rules/rule_topics/mechs.yaml": "16c3023f86808ba43c24dbca4d385d73",
"assets/assets/rules/rule_topics/modifiers.yaml": "65d4781bc475973c3bc0605c131bb146",
"assets/assets/rules/rule_topics/move.yaml": "dde5c5b3e7a011c71ba2ddb340f0ce70",
"assets/assets/rules/rule_topics/movement.yaml": "8e048d195de8d323637197333123b6cd",
"assets/assets/rules/rule_topics/nebula.yaml": "d8916c6cd646778334d6374082f9814c",
"assets/assets/rules/rule_topics/neighbors.yaml": "3c27978050e735c406f2edfe4f6198e2",
"assets/assets/rules/rule_topics/objective_cards.yaml": "43ec70fcc6ceaa991fc5a45706d9224a",
"assets/assets/rules/rule_topics/opponent.yaml": "768d9e14d23d811ed48fba76d365869e",
"assets/assets/rules/rule_topics/pds.yaml": "604a9f3ed0488e68aed9ece36a1d3654",
"assets/assets/rules/rule_topics/planetary_shield.yaml": "2be796d644eab021ea7a14f9dc59230d",
"assets/assets/rules/rule_topics/planets.yaml": "97a391bc45a2b7d169996a1df8934d7a",
"assets/assets/rules/rule_topics/politics.yaml": "d09f279e015a993cd2decf4bf5c59db2",
"assets/assets/rules/rule_topics/producing_units.yaml": "86190a6edaa90bc42f6d59d4dea95eea",
"assets/assets/rules/rule_topics/production.yaml": "c1722986cdceebc915e7282ae2541613",
"assets/assets/rules/rule_topics/promissory_notes.yaml": "0b0909b3e3a0957058e2cf7289519761",
"assets/assets/rules/rule_topics/purge.yaml": "cad13d6912aea0c9e8a8cdbdfbba7164",
"assets/assets/rules/rule_topics/readied.yaml": "e571a61b7b026d77051f9a4072ba09a7",
"assets/assets/rules/rule_topics/reinforcements.yaml": "bace9dc004d3f97c6110e6b732b6984d",
"assets/assets/rules/rule_topics/relics.yaml": "c85fc683dae00a301eedf18475bfdf68",
"assets/assets/rules/rule_topics/rerolls.yaml": "a226c2b9b374dfbeb2b59d07d0280613",
"assets/assets/rules/rule_topics/resources.yaml": "4463a38f461fd3d1cf8c2bfc96491f1c",
"assets/assets/rules/rule_topics/ships.yaml": "d3391d8074c842f66596a84b1c1cbd85",
"assets/assets/rules/rule_topics/space_cannon.yaml": "50a1565317cfbdb87e1b909d94254cec",
"assets/assets/rules/rule_topics/space_combat.yaml": "a66751e05ddd8478c4ab168c8e80e158",
"assets/assets/rules/rule_topics/space_dock.yaml": "a94a52ebc88874e8884b20d56a5f1667",
"assets/assets/rules/rule_topics/speaker.yaml": "815ebe3107d33e4f20bb35cdddaf53b3",
"assets/assets/rules/rule_topics/status_phase.yaml": "3ecf39f1968254462b28d60287e691b4",
"assets/assets/rules/rule_topics/strategic_action.yaml": "151816efd39c538b1d729318d62249f3",
"assets/assets/rules/rule_topics/strategy_card.yaml": "b3726743dac4107fbd20d1ac03e86f0e",
"assets/assets/rules/rule_topics/strategy_phase.yaml": "18db00d91a4379e8452e7481bb34ad9d",
"assets/assets/rules/rule_topics/structures.yaml": "321d42a2606db43e69d79c6a8c63035b",
"assets/assets/rules/rule_topics/supernova.yaml": "6d6d592b2d6661f03c258291b9a3f62e",
"assets/assets/rules/rule_topics/sustain_damage.yaml": "17de6afc8d5149a5c58fccd346929102",
"assets/assets/rules/rule_topics/system_tiles.yaml": "52a9aeb62d56a104c5aac02c4dc0dd6a",
"assets/assets/rules/rule_topics/tactical_action.yaml": "b2cb969d4b72fc0c376b023c355b4316",
"assets/assets/rules/rule_topics/technology.yaml": "66f44fcf8c7181b3f4e13efc55958a06",
"assets/assets/rules/rule_topics/technology_(s.c.).yaml": "31963e40e88ff6c23ea37d97d9aac599",
"assets/assets/rules/rule_topics/trade.yaml": "a62e4685bc2c466059f97f5e64764111",
"assets/assets/rules/rule_topics/trade_goods.yaml": "63dd402d88a5ba046b6a570adc438449",
"assets/assets/rules/rule_topics/transactions.yaml": "9653f323b58a4e020879082e006b3e18",
"assets/assets/rules/rule_topics/transport.yaml": "42829d6c269a7045a056cf4d6d2ce9db",
"assets/assets/rules/rule_topics/units.yaml": "fb29a4a51244e7f6c36a010e2b3d0c69",
"assets/assets/rules/rule_topics/unit_upgrades.yaml": "72a68168e8a488dcf3b003a5b72319de",
"assets/assets/rules/rule_topics/victory_points.yaml": "6f576549b294f1fb33622ff2bf42d495",
"assets/assets/rules/rule_topics/warfare.yaml": "a46f28a83d6b38b91630d3c4917425d7",
"assets/assets/rules/rule_topics/wormholes.yaml": "f39605671c9dd2ca9e57b4039dd75464",
"assets/assets/rules/rule_topics/wormhole_nexus.yaml": "0f76ad30c34f59a6279380988e7119bf",
"assets/FontManifest.json": "7b2a36307916a9721811788013e65289",
"assets/fonts/MaterialIcons-Regular.otf": "c0ad29d56cfe3890223c02da3c6e0448",
"assets/NOTICES": "9b7255f6e7f6d3024b5569d2b03e622a",
"assets/shaders/ink_sparkle.frag": "ecc85a2e95f5e9f53123dcaf8cb9b6ce",
"canvaskit/canvaskit.js": "86e461cf471c1640fd2b461ece4589df",
"canvaskit/canvaskit.js.symbols": "68eb703b9a609baef8ee0e413b442f33",
"canvaskit/canvaskit.wasm": "efeeba7dcc952dae57870d4df3111fad",
"canvaskit/chromium/canvaskit.js": "34beda9f39eb7d992d46125ca868dc61",
"canvaskit/chromium/canvaskit.js.symbols": "5a23598a2a8efd18ec3b60de5d28af8f",
"canvaskit/chromium/canvaskit.wasm": "64a386c87532ae52ae041d18a32a3635",
"canvaskit/skwasm.js": "f2ad9363618c5f62e813740099a80e63",
"canvaskit/skwasm.js.symbols": "80806576fa1056b43dd6d0b445b4b6f7",
"canvaskit/skwasm.wasm": "f0dfd99007f989368db17c9abeed5a49",
"canvaskit/skwasm_st.js": "d1326ceef381ad382ab492ba5d96f04d",
"canvaskit/skwasm_st.js.symbols": "c7e7aac7cd8b612defd62b43e3050bdd",
"canvaskit/skwasm_st.wasm": "56c3973560dfcbf28ce47cebe40f3206",
"favicon.png": "5dcef449791fa27946b3d35ad8803796",
"flutter.js": "76f08d47ff9f5715220992f993002504",
"flutter_bootstrap.js": "114461c7a139b3ea31999cd0b449aff2",
"icons/Icon-192.png": "ac9a721a12bbc803b44f645561ecb1e1",
"icons/Icon-512.png": "96e752610906ba2a93c65f8abe1645f1",
"icons/Icon-maskable-192.png": "c457ef57daa1d16f64b27b786ec2ea3c",
"icons/Icon-maskable-512.png": "301a7604d45b3e739efc881eb04896ea",
"index.html": "ace3dddf1cd72a5fb4aecf93662c2269",
"/": "ace3dddf1cd72a5fb4aecf93662c2269",
"main.dart.js": "f1a4a93839feaa69c95694a0bfca489b",
"manifest.json": "e8dfc8ed694a6f994d3a6a1d355c6131",
"version.json": "3764aecbaf5bd28550969aecd5dfb83d"};
// The application shell files that are downloaded before a service worker can
// start.
const CORE = ["main.dart.js",
"index.html",
"flutter_bootstrap.js",
"assets/AssetManifest.bin.json",
"assets/FontManifest.json"];

// During install, the TEMP cache is populated with the application shell files.
self.addEventListener("install", (event) => {
  self.skipWaiting();
  return event.waitUntil(
    caches.open(TEMP).then((cache) => {
      return cache.addAll(
        CORE.map((value) => new Request(value, {'cache': 'reload'})));
    })
  );
});
// During activate, the cache is populated with the temp files downloaded in
// install. If this service worker is upgrading from one with a saved
// MANIFEST, then use this to retain unchanged resource files.
self.addEventListener("activate", function(event) {
  return event.waitUntil(async function() {
    try {
      var contentCache = await caches.open(CACHE_NAME);
      var tempCache = await caches.open(TEMP);
      var manifestCache = await caches.open(MANIFEST);
      var manifest = await manifestCache.match('manifest');
      // When there is no prior manifest, clear the entire cache.
      if (!manifest) {
        await caches.delete(CACHE_NAME);
        contentCache = await caches.open(CACHE_NAME);
        for (var request of await tempCache.keys()) {
          var response = await tempCache.match(request);
          await contentCache.put(request, response);
        }
        await caches.delete(TEMP);
        // Save the manifest to make future upgrades efficient.
        await manifestCache.put('manifest', new Response(JSON.stringify(RESOURCES)));
        // Claim client to enable caching on first launch
        self.clients.claim();
        return;
      }
      var oldManifest = await manifest.json();
      var origin = self.location.origin;
      for (var request of await contentCache.keys()) {
        var key = request.url.substring(origin.length + 1);
        if (key == "") {
          key = "/";
        }
        // If a resource from the old manifest is not in the new cache, or if
        // the MD5 sum has changed, delete it. Otherwise the resource is left
        // in the cache and can be reused by the new service worker.
        if (!RESOURCES[key] || RESOURCES[key] != oldManifest[key]) {
          await contentCache.delete(request);
        }
      }
      // Populate the cache with the app shell TEMP files, potentially overwriting
      // cache files preserved above.
      for (var request of await tempCache.keys()) {
        var response = await tempCache.match(request);
        await contentCache.put(request, response);
      }
      await caches.delete(TEMP);
      // Save the manifest to make future upgrades efficient.
      await manifestCache.put('manifest', new Response(JSON.stringify(RESOURCES)));
      // Claim client to enable caching on first launch
      self.clients.claim();
      return;
    } catch (err) {
      // On an unhandled exception the state of the cache cannot be guaranteed.
      console.error('Failed to upgrade service worker: ' + err);
      await caches.delete(CACHE_NAME);
      await caches.delete(TEMP);
      await caches.delete(MANIFEST);
    }
  }());
});
// The fetch handler redirects requests for RESOURCE files to the service
// worker cache.
self.addEventListener("fetch", (event) => {
  if (event.request.method !== 'GET') {
    return;
  }
  var origin = self.location.origin;
  var key = event.request.url.substring(origin.length + 1);
  // Redirect URLs to the index.html
  if (key.indexOf('?v=') != -1) {
    key = key.split('?v=')[0];
  }
  if (event.request.url == origin || event.request.url.startsWith(origin + '/#') || key == '') {
    key = '/';
  }
  // If the URL is not the RESOURCE list then return to signal that the
  // browser should take over.
  if (!RESOURCES[key]) {
    return;
  }
  // If the URL is the index.html, perform an online-first request.
  if (key == '/') {
    return onlineFirst(event);
  }
  event.respondWith(caches.open(CACHE_NAME)
    .then((cache) =>  {
      return cache.match(event.request).then((response) => {
        // Either respond with the cached resource, or perform a fetch and
        // lazily populate the cache only if the resource was successfully fetched.
        return response || fetch(event.request).then((response) => {
          if (response && Boolean(response.ok)) {
            cache.put(event.request, response.clone());
          }
          return response;
        });
      })
    })
  );
});
self.addEventListener('message', (event) => {
  // SkipWaiting can be used to immediately activate a waiting service worker.
  // This will also require a page refresh triggered by the main worker.
  if (event.data === 'skipWaiting') {
    self.skipWaiting();
    return;
  }
  if (event.data === 'downloadOffline') {
    downloadOffline();
    return;
  }
});
// Download offline will check the RESOURCES for all files not in the cache
// and populate them.
async function downloadOffline() {
  var resources = [];
  var contentCache = await caches.open(CACHE_NAME);
  var currentContent = {};
  for (var request of await contentCache.keys()) {
    var key = request.url.substring(origin.length + 1);
    if (key == "") {
      key = "/";
    }
    currentContent[key] = true;
  }
  for (var resourceKey of Object.keys(RESOURCES)) {
    if (!currentContent[resourceKey]) {
      resources.push(resourceKey);
    }
  }
  return contentCache.addAll(resources);
}
// Attempt to download the resource online before falling back to
// the offline cache.
function onlineFirst(event) {
  return event.respondWith(
    fetch(event.request).then((response) => {
      return caches.open(CACHE_NAME).then((cache) => {
        cache.put(event.request, response.clone());
        return response;
      });
    }).catch((error) => {
      return caches.open(CACHE_NAME).then((cache) => {
        return cache.match(event.request).then((response) => {
          if (response != null) {
            return response;
          }
          throw error;
        });
      });
    })
  );
}
