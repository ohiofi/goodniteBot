<?php

$consumer_key = "xxx";
$consumer_secret = "xxx";
$access_key = "xxx";
$access_secret = "xxx";

require_once('twitteroauth.php');// Use the twitteroauth library
$twitter = new TwitterOAuth ($consumer_key ,$consumer_secret , $access_key , $access_secret );// Connect to Twitter using TwitterOAuth library

$randomReply = array();// Create a new array called randomReply
$newTweetCount = 0;// Set the tweets count to zero
$lastTweetScreenName = NULL;

$myUserInfo = $twitter->get('account/verify_credentials');// Get ShouldBot's info
$myLastTweet = $twitter->get('statuses/user_timeline', array('user_id' => $myUserInfo->id_str, 'count' => 1));// Use ShouldBot's info to get ShouldBot's last tweet
$airRhymes = array("bear","millionaire","chocolate Éclair","black bear","multimillionaire","cinnamon bear","grizzly bear","teddy bear","polar bear","arctic hare","air","hair","mare","pear","pair","chair","square","hare","fair","county fair","flair","flare","heir","lair","snare","questionaire","Voltaire","Pierre");
$rhymes = array(
  array("mail","whale","jail","sail","kale","ale","hail","nail","pail","rail","tail","tale","veil","Yale"),
  array("brain","Spain","chain","crane","cane","stain","pane","plane","drain","strain","rain","terrain","Great Dane","mane"),
  array("cake","lake","stake","brake","snake","rake"),
  array("ball","mall","hall","phone call","cannonball","fireball","goofball","nightfall","pitfall","racquetball","waterfall"),
  array("bear","millionaire","chocolate Éclair","black bear","multimillionaire","cinnamon bear","grizzly bear","teddy bear","polar bear","arctic hare","air","hair","mare","pear","pair","chair","square","hare","fair","county fair","flair","flare","heir","lair","snare","questionaire","Voltaire","Pierre"),
  array("clam","cam","dam","ram","lamb","graham","sham","tram","exam","madame","program","jam","telegram","yam"),
  array("can","clan","fan","man","Iran","scan","Japan","plan","Sudan","LAN","pan"),
  array("bank","blank","prank","tank"),
  array("cap","lap","map","rap","trap"),
  array("cash","hash","lash","mash","ash"),
  array("bat","cat","rat","hat","animal fat"),
  array("Beyoncé","bay","hay","clay","play","sleigh","spray","stray","tray","display","essay","fillet","highway","résumé","stairway","bouquet","padre","valet","Will Forte","USA","ballet","buffet","fiancé","subway","Norway"),
  array("jaw","claw","straw","slaw","saw","paw","gaping maw","Utah","flaw","law","shaw","outlaw"),
  array("bed","bread","head","shed","spread","thread","thoroughbred","bed","head","sled","thoroughbred","bread","shed"),
  array("flee","knee","tree","key","ski","pea","bee","algae","army","sea","debris","tv","referee","Tennessee", "bourgeoisie","CD","DVD"),
  array("bell","Adele","hotel","smell","cell","well","shell","gel"),
  array("jet","net","pet","vet","brunette","coronet","moist towelette","cigarette","cadet"),
  array("chest","nest","vest","guest","test","pest"),
  array("eye","fly","fry","guy","pie","spy","tie"),
  array("kite","night","knight","fight","sprite","fright","height","bite"),
  array("vine","spine","nine","fine","mine","resign","line","pine","spine","wine"),
  array("log","fog","frog","hog","bog","cog","dog","grog","blog")
  );
$adj = array("fluffy","big","fat","dumb","stupid","ugly","unappealing","tall","short","pleasant","cute","smelly","stinky","annoying","fun","short","small","athletic","nerdy","smart","invisible","tall","short","fat","pudgy","ugly","skinny","ratchet","tan","cool","gnarly","scrawny","chubby","thug","pale","gucci","gangsta","short","ghetto","colossal","squishy","cute","fluffy","smart","invisible","vexed","heartbroken","scared","depressed","sly","sneaky","obsessed","possessed","interested","fearful","shy","proud","abandoned","altrusic","bite-sized","dizzy","clear-cut","elliptical","clumsy","crazy","funny","skinny","tall","smart","young","nervous","fast","smart","invisible","fat","annoying","dumb","ugly","fat","stupid","mean","Annoying","stupid","dumb","ugly","short","Awesome","ugly","unapealing","ugly","loser","pretty","cute","attractive","unattractive","nerd","geek","popular","smart","dumb","idiot","Funny", "Smart", "Cool", "Fast","soft","funny","pretty","ugly","stupid", "yellow", "red", "blue", "green", "white", "black", "gray", "magenta", "orange", "purple", "indigo", "soft", "calm", "furious", "excited", "happy", "anxious", "embarrassed","funny","dumb","disgusting","unattractive","attractive","dumb","crippled","fast","oversized","lovely","gross","crazy","funky","loser","rested","weirdo","rusty","funny","booger eater","deformed", "nonfunctional","do do dunderhead","booger eating crumbum","ugly","weird","sad","humongous","funny","Disgusting","ugly","enormous","weird","stupid","pretty","hideous","bland","random","dumb","microscopic","oblivious","touchy","twitchy","depressed","orange","blue","Lime Green","black","Purple","white","indigo","turquoise","gigantic","dark","tiny","bright","creepy","tall","pale","small","Tane","strong","fast","aggressive","shy","outgoing","Sunny", "Tall", "Hairy","ugly","fat","thug","gangsta","tiny","huge","intelligent","rebellious","strong","courageous","quiet","friendly","imaginative","shy","friendly","kind","tyrannical","funny","observant","cowardly","dull","obedient","mysterious","vulgar","Mystical","mature","Immature","dense","predictable","scrawny","dumb","tiny","beautiful","one eyed","redneck","short","fat","skinny","thin","wide","beautiful","dirty","poor","dark","dangerous","black","paranoid","confused","excited","bouncy","faceless","dishonest","speechless","lonely","peaceful","inappropriate","round", "fuzzy", "sharp", "dirty", "ugly", "mentally unstable", "robotic", "obese", "overweight", "evil", "annoying", "multiheaded","big headed","hillblilly", "dinosaur-armed","big nosed","thug","gucci","short","lame","pitty","disgusting","ugly","cute","fluffy","sweet","short","ugly","grouchy","fat","skinny","chunky","smelly","dirty","lame","pitiful","ugly","flat","Giant","puking");
$animal = array("unicorn","raven","sparrow","scorpion","coyote","eagle","owl","lizard","zebra","duck","kitten","unicorn","raven","sparrow","scorpion","coyote","eagle","owl","lizard","zebra","duck","kitten","unicorn","puppies",
"kittens","horses","bunnies","zebras","dog","dragon","unicorn","snake","kitten","shark","dolphin","drop bear","leopard","bear","sting ray","kangaroo","owl","lizard","fish","rat","cheetah","cow","sheep","chicken","cheetah",
"cow","cheetah","dog","cat","zebra","fish","rat","cow","sheep","chicken","wolf","scorpion","crocodile","alligator","cat","dog","lizard","queko","mice","turkey","squirrel","deer","wolf","narhwal","tropical shrimp",
"monkey","chicken","tiger","dog", "horse", "cheetah", "leopard", "giraffe", "rabbit","horse","giraffe","zebra","cat","bear", "fish", "wolf", "fox", "cow", "calf", "horse", "foal", "frog", "clownfish", "pufferfish", "shrimp",
"crab","tiger","chicken","horse","mule","cricket","bush baby","blobfish","sloth","cyclops","dragon","zombie","dragon","lizard","human","tiger","lion","komodo dragon","zombie","snake","wolf","lizard","dragon","velociraptor","snake",
"zombie","tiger","tyrannosaurus rex","spider","scorpion","grizzly bear","frog","turtle","weasel","duck","kitten","chicken","peacock","toucan","troll","hippocampus","hydra","phoenix","gorgon","meerkat","owl","giraffe","arctic seal","alligator","chicken",
"owl","scorpion","coyote","eagle","snake","lizard","lion","goldfish","dog","elephant","tiger","panda","camel","jellyfish","rabbit","mouse","bird","deer","rabbit","elk","pig","cow","bull","groundhog","uniduck",
"pizzaduck", "crab", "cat", "tiger", "lion", "bear","unicorn","duck","kitten","horse","megalodon","pegasus","crab","spider","chicken","pig","ant","dragon","mermaid","owl","shark","dodo","racoon","flamingo","yeti",
"bigfoot","ogre","werewolf","vampire","dragon","cerberus","dog","lion","tiger","monkey","lizard","newt","koala","tapir","chicken","horse","pig","puppy","mouse","wild dog","wild cat","bear","duck","kitten","dragon",
"turtle","duck","minotaur","loch ness monster","alien","bat","rat","chicken","sloth", "clown fish", "gazelle", "peacock", "camel", "elephant", "ostrich","shark","geese","duck","bat","pig","tiger","elephant","mink","tiger","cougar",
"bat","bear","fish","stingray","rabbit");
$synonymsForFun = array("sport","fun","play","a joke","joy","cheer","a game","mirth","a romp","a sight","nonsense","a treat","absurdity","enjoyment","a pastime","a blast","buffoonery","clowning","festivity","tomfoolery","foolery","horseplay","playfulness","highjinks","joking","drivel","baloney","babble","diddle","folly","foolishness","gibberish","madness","rubbish","silliness","stupidity","balderdash","bananas","craziness","giddiness","hogwash","hooey","jest","poppycock","tripe","a goof","goofiness","applesauce","a farce","idiocy","daftness","illogicalness","insanity","madness","lunacy","horse feathers","mish mash","malarky","monkey business","antics","clowning around","absurdness","a prank","mischief","monkeyshine","piffle","a delight","regalement","hilarity","hoopla","comedy","a schtick","satire","humor","slapstick","a scene","a display","a spectacle","a show");
$synonymsForLaughed = array("laughed","chuckled","giggled","grinned","LOL'd","ROFL'd","howled","snickered","snorted","chortled","cracked up","smirked","cackled","guffawed","smiled","was amused","was delighted","was happy","was pleased","beamed","died laughing","was entertained","was tickled");
$roomNoun =array("room","hall","bathroom","man cave","apartment","cabin","cave","garage","chamber","cubicle","office","den","basement","kitchen","condo","crib","chalet","place","cabin","outback","house","skyscraper","roadhouse","saloon","shack","diner","hut","warehouse","tent","palace","pizzeria","castle","kingdom","lounge","village","shop","factory","cafe","bar","cottage","den","cave","fort","bungalow","asylum","building","cage","coliseum","dungeon","jail","prison cell","stadium","pit","gymnasium","school","classroom","chatroom","attic","cafeteria","coatroom","computer lab","study hall","library","fallout shelter","shed","workshop","control room","war room","laundry room","barn","greenhouse","gas station","hotel","mall","supermarket","museum","theater","courthouse","post office","church","airport","lighthouse","bakery","beauty salon","fast-food restaurant","hospital","funeral home","igloo","tree house","mobile home","trailer park","living room","dining room");
$color =array("black","white","green","purple","orange","red","pink","blue","yellow","brown","gray","gold","mauve","peach","tan","slate","teal","taupe","bronze","rose","plum","mint","grape","jade","pearl","lime");

shuffle($rhymes);
$rhymeSet1=$rhymes[0];
$rhymeSet2=$rhymes[1];
$rhymeSet3=$rhymes[2];
$rhymeSet4=$rhymes[3];
$rhymeSet5=$rhymes[4];
$rhymeSet6=$rhymes[5];
shuffle($rhymeSet1);
shuffle($rhymeSet2);
shuffle($rhymeSet3);
shuffle($rhymeSet4);
shuffle($rhymeSet5);
shuffle($rhymeSet6);
shuffle($adj);
shuffle($roomNoun);
shuffle($color);
shuffle($animal);
shuffle($airRhymes);
shuffle($synonymsForFun);
shuffle($synonymsForLaughed);
$tweet = array("In the ".$adj[0]." ".$color[0]." ".$roomNoun[0].", there was a telephone. And a ".$color[1]." ".$rhymeSet1[0].", and a picture of the ".$animal[0]." jumping over the ".$rhymeSet1[1].".",
"And there were three ".$adj[1]." ".$rhymeSet2[0]."s sitting on ".$rhymeSet2[1]."s. And two ".$adj[2]." ".$rhymeSet3[0]."s, and a pair of ".$rhymeSet3[1]."s.",
"And a ".$adj[3]." toy ".$rhymeSet4[0].", and a ".$adj[4]." ".$rhymeSet4[1].". And a ".$animal[1]." and a ".$rhymeSet5[0].", and a bowl full of ".$rhymeSet5[1]."s.",
"And a ".$adj[5]." ".$adj[6]." lady who was whispering '".$rhymeSet5[2]."'.",
"Goodnight ".$roomNoun[0].", goodnight ".$rhymeSet1[1].". Goodnight ".$animal[0]." jumping over the ".$rhymeSet1[1].". Goodnight light and the ".$color[1]." ".$rhymeSet1[0].".",
"Goodnight ".$rhymeSet2[0]."s, goodnight ".$rhymeSet2[1]."s. Goodnight ".$rhymeSet3[0]."s, and goodnight ".$rhymeSet3[1]."s. Goodnight ".$adj[3]." ".$rhymeSet4[0].", and goodnight ".$rhymeSet4[1].".",
"Goodnight ".$animal[1].", and goodnight ".$rhymeSet5[0].". Goodnight nobody, goodnight ".$rhymeSet5[1]."s. And goodnight to the ".$adj[6]." lady whispering '".$rhymeSet5[2]."'.",
"Goodnight ".$rhymeSet6[0]."s, goodnight ".$airRhymes[0].", goodnight ".$rhymeSet6[1]."s everywhere.");

// sleep for 40 seconds
sleep(40);

foreach ($tweet as &$tweetLine) {
  if(strlen($tweetLine) > 140)// If tweet is already too long, shorten it.
    $tweetLine = substr($tweetLine, 0, 140);
  if ($newTweetCount == 0) {
    $twitter->post('statuses/update', array('status' => $tweetLine));// Post tweet
  }else{
    $twitter->post('statuses/update', array('status' => $tweetLine,'in_reply_to_status_id' => $myLastTweet[0]->id_str));// Post tweet
  }
  $newTweetCount++;// Add one to output counter
  echo "<br/>";echo $newTweetCount." ".$tweetLine."\n";echo "<br/>";// If bot is run manually, user will see the final tweet.

  // sleep for 2 seconds
  sleep(2);
  $myLastTweet = $twitter->get('statuses/user_timeline', array('user_id' => $myUserInfo->id_str, 'count' => 1));// Use ShouldBot's info to get ShouldBot's last tweet
}

?>
