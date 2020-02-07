<!DOCTYPE HTML>

<?php

/*

TO DO
=====
Early Family History
Random clans
Random homelands
Random ancestor backgrounds
Random own homeland
Choices (like in Battle of Pennel Ford result 20)
Alternative birth years
Add Balazarings http://www.backtobalazar.com/significant-family-events/
Optional participation inyearly events
*/

echo "<html>";
echo "<head>";
echo "    <meta charset=\"utf-8\">";
echo "    <title>RQG Family History</title>";
echo "    <link rel=\"stylesheet\" href=\"css/style.css\" />";
echo "</head>";

echo "<body>";

echo "<h1>Family History</h1>";

$homeland = $_POST['homeland'];
$grandocc = $_POST['grandocc'];
$parentocc = $_POST['parentocc'];
$early = $_POST['early'];

$gpdead = 0;
$pdead = 0;
$siege1623 = 0;
$pennel = 0;
$liberation = 0;

function hitLoc()
{
     $loc = mt_rand (1,20);
     if ($loc < 5)
     {
          $hit = "right leg";
          return $hit;
     }
     if ($loc > 4 && $loc < 9)
     {
          $hit = "left leg";
          return $hit;
     }
     if ($loc > 8 && $loc < 12)
     {
          $hit = "abdomen";
          return $hit;
     }
     if ($loc == 12)
     {
          $hit = "chest";
          return $hit;
     }
     if ($loc > 12 && $loc < 16)
     {
          $hit = "right arm";
          return $hit;
     }
     if ($loc > 15 && $loc < 19)
     {
          $hit = "right arm";
          return $hit;
     }
     if ($loc > 18)
     {
          $hit = "head";
          return $hit;
     }
}


function elderRace()
{
     $race = mt_rand (1,6);
     if ($race == 1)
     {
          return "Aldryami";
     }
     if ($race == 2)
     {
          return "Beast Men";
     }
     if ($race == 3)
     {
          return "dragonewts";
     }
     if ($race == 4)
     {
          return "dwarves";
     }
     if ($race == 5)
     {
          return "trolls";
     }
     if ($race == 6)
     {
          return "tusk riders";
     }
}


function elderFriend()
{
     $race = mt_rand (1,9);
     if ($race == 1)
     {
          return "centaur";
     }
     if ($race == 2)
     {
          return "dark troll";
     }
     if ($race == 3)
     {
          return "dragonewt";
     }
     if ($race == 4)
     {
          return "dwarf";
     }
     if ($race == 5)
     {
          return "duck";
     }
     if ($race == 6)
     {
          return "elf";
     }
     if ($race == 7)
     {
          return "fox woman";
     }
     if ($race == 8)
     {
          return "Telmori werewolf";
     }
     if ($race == 9)
     {
          return "Wind Child";
     }
}



function civilwar()
{
     $civilwar = mt_rand (1,20);
     if ($homeland == "Lunar Tarsh")
     {
          $civilwar = $civilwar - 5;
     }
     if ($homeland == "Esrolia" || $homeland == "Sartar")
     {
          $civilwar = $civilwar + 5;
     }
     if ($civilwar < 6)
     {
          echo "<p>You barely survived assassination by Old Earth Alliance partisans. Gain Hate (Esrolia).</p>";
     }
     if ($civilwar > 5 && $civilwar < 16)
     {
          echo "<p>You survived.</p>";
          $siege1623 = 1;
     }
     if ($civilwar > 15 && $civilwar < 18)
     {
          echo "<p>You barely survived assassination by Red Earth Alliance partisans of the Lunar Empire. Gain Hate (Lunar Empire).</p>";
     }
     if ($civilwar > 17 && $civilwar < 20)
     {
          $pillage = 100*(mt_rand (1,6) + mt_rand (1,6) + mt_rand (1,6));
          echo "<p>You pillaged Red Earth supporters. Gain $pillage L.</p>";
     }
     if ($civilwar > 19)
     {
          $rep = mt_rand (1,6);
          echo "<p>You fought gloriously protecting Queen Samastina from Red Earth assassins. Gain Honor and Loyalty (Queen Samastina). Gain +$rep% Reputation.</p>";
     }
}

function aurochHills()
{
     $auroch = mt_rand (1,20);
     if ($homeland == "Lunar Tarsh")
     {
          $auroch = $auroch - 5;
     }
     if ($homeland == "Sartar")
     {
          $auroch = $auroch + 5;
     }
     if ($auroch < 2)
     {
          echo "You were nearly killed by rebel magicians. Gain Battle +5% and Hate (Sartar).</p>";
     }
     if ($auroch > 1 && $auroch < 6)
     {
          echo "You were nearly killed in battle. Gain Battle +5%.</p>";
     }
     if ($auroch > 5 && $auroch < 16)
     {
          echo "You survived. Gain Battle +5%.</p>";
     }
     if ($auroch > 15 && $auroch < 18)
     {
          echo "You were wounded. Gain Battle +5%.</p>";
     }
     if ($auroch > 17 && $auroch < 20)
     {
          $rep = mt_rand (1,6);
          echo "You fought with great glory for the gods. Gain Honor Passion, Loyalty (temple), and +$rep% Reputation.</p>";
     }
     if ($auroch > 19)
     {
          $rep = mt_rand (1,6);
          echo "You aided King Broyan in awakening Orlanth. Gain +5% Battle, Devotion (deity), and +$rep% Reputation. You then took part in the civil war in Esrolia.</p>";
          civilwar();
     }
}

function jaldonsum()
{
     $jaldon = mt_rand (1,20);
     if ($jaldon < 11)
     {
          echo "<p>You were present at the summoning of Jaldon Goldentooth. You acknowledged Argrath as the White Bull and returned to your tribe. Gain Loyalty (White Bull).</p>";
     }
     if ($jaldon > 10 && $jaldon < 16)
     {
          echo "<p>You were present at the summoning of Jaldon Goldentooth. You acknowledged Argrath as the White Bull and returned to your tribe. Gain Loyalty (White Bull).</p>";
          $liberation = 1;
     }
     if ($jaldon > 15 && $jaldon < 19)
     {
          echo "<p>You were present at the summoning of Jaldon Goldentooth. You pledged undying loyalty to Argrath as the White Bull and to Jaldon Goldentooth. Gain Devotion (White Bull). Gain Loyalty (White Bull) at 70% or +20%.</p>";
          $liberation = 1;
     }
     if ($jaldon > 18)
     {
          $rep = mt_rand (1,6);
          echo "<p>You were present at the summoning of Jaldon Goldentooth. You killed a member of your tribe who opposed allying with the White Bull. Gain +$rep% Reputation, Loyalty (White Bull) at 70% or +20%, and modify Loyalty (tribe) by -10%</p>";
          $liberation = 1;
     }
}

function heirloom($roll)
{
     $magic = " ";
     if ($roll == 1)
     {
          $magic = "an ancestor worshiped as a hero by your cult. Gain Devotion (deity) or Loyalty (temple) or add +10% if already possessed. You also get +5% bonus to your Orate and +5% to your Reputation.";
     }
     if ($roll == 2)
     {
          $magic = "a famous hero as an ancestor. Add +10% to the Orate skill and +5% to your Reputation.";
     }
     if ($roll == 3)
     {
          $pot = mt_rand (1,6);
          $magic = "a pot of woad (see Rune magic spell Bless Woad), $pot points of potency.";
     }
     if ($roll == 4)
     {
          $pots = mt_rand (1,3);
          $magic = "$pots pots of Rhino Fat. Each pot contains enough to add 1 point of armor to all hit locations, which can be worn below clothing and armor, though the smell is quite pungent. One application takes ten minutes to apply and lasts one hour, though the smell of rancid meat lingers.";
     }
     if ($roll == 5)
     {
          $magic = "a bronze or ceramic votive image of your god that adds +10% to the Worship (deity) skill.";
     }
     if ($roll == 6)
     {
          $flip = mt_rand (1,2);
          if ($flip == 1)
          {
               $thing = "brooch";
          } else
          {
               $thing = "buckle";
          }
          $magic = "a $thing depicting a fat, grinning dwarf that is a 2-point spell matrix for Heal 2.";
     }
     if ($roll == 7)
     {
          $magic = "a small stone figurine of a crested dragonewt pointing in a direction. The figurine is a 1-point spell matrix for a Find (substance) spell; the player chooses what specific substance.";
     }
     if ($roll > 7 && $roll < 12)
     {
          $mps = (mt_rand (1,6) + mt_rand (1,6)) + 3;
          $magic = "a magic POW storage crystal that can hold up to $mps magic points or serve as a spiritbinding matrix.";
     }
     if ($roll == 12)
     {
          $int = (mt_rand (1,6) + mt_rand (1,6) + mt_rand (1,6));
          $pow = (mt_rand (1,6) + mt_rand (1,6) + mt_rand (1,6));
          $magic = "an awakened small animal (SIZ 2 or less, such as a cat, a lizard, a bird, etc.) with $int INT and $pow POW. Otherwise it is normal for its species. The animal knows 3 points of spirit magic of your choice. It can speak the adventurer's language and serves as a loyal companion, but is otherwise independent.";
     }
     if ($roll == 13)
     {
          $num = mt_rand (1,6);
          $magic = "$num healing potions that heal 1D10 points of damage each.";
     }
     if ($roll == 14)
     {
          $worth = 100 * (mt_rand (1,6) + mt_rand (1,6));
          $magic = "a necklace worth $worth L containing a 2-point spirit magic matrix for Glamour 2.";
     }
     if ($roll == 15)
     {
          $worth = 100 * (mt_rand (1,6) + mt_rand (1,6));
          $magic = "an ancient gold serpent armband with 2 points of a spirit magic matrix, worth $worth L.";
     }
     if ($roll == 16)
     {
          $magic = "a finely-made musical instrument, imbued with magical properties (add +20% to Play Instrument when used).";
     }
     if ($roll == 17)
     {
          $magic = "a finely made weapon (+1 HP and worth twice as much as normal) containing a 2-point spirit magic spell matrix (Bladesharp, Bludgeon, Multimissile, or Strength).";
     }
     if ($roll == 18)
     {
          $enc = mt_rand (1,3);
          $magic = "an ingot of iron or other pure Rune metal weighing $enc ENC which can be forged into a weapon, piece of armor, or other object. An unenchanted iron item has half again the number of hit or armor points. Each point of ENC reduces the user's chance of casting magic by -5%, with the same chance that magic spells cast on them will have no effect. Enchanted items act as normal.";
     }
     if ($roll == 19)
     {
          $magic = "an ostentatious metal helmet (normal AP and ENC but worth thrice normal) and containing a 2-point spirit magic matrix (Countermagic, Protection, or Spirit Screen).";
     }
     if ($roll > 19)
     {
          $magic = "<i>((Roll twice. If this roll comes up again, roll twice more.))</i>";
     }
     return $magic;
}

function libPavis()
{
     $pavis = mt_rand (1,20);
     if ($homeland == "Lunar Tarsh")
     {
          $pavis = $pavis - 10;
     }
     if ($homeland == "Prax")
     {
          $pavis = $pavis + 5;
     }
     if ($homeland == "Sartar")
     {
          $pavis = $pavis + 5;
     }
     if ($pavis < 2)
     {
          echo "<p>During the Liberation of Pavis you were sold into slavery. You may have later escaped, or you now belong to another. Gain Hate (Prax) at 80%.</p>";
     }
     if ($pavis == 2)
     {
          echo "<p>During the Liberation of Pavis you were badly wounded, robbed, and left for dead by Praxians or Sartarite rebels. Gain Hate (Prax) or Hate (Sartar). Give yourself a distinctive scar.</p>";
     }
     if ($pavis > 2 && $pavis < 9)
     {
          $hit = hitLoc();
          echo "<p>During the Liberation of Pavis you were nearly killed in battle. Gain Battle +5% and a distinctive scar on your $hit.</p>";
     }
     if ($pavis > 8 && $pavis < 14)
     {
          echo "<p>You survived the Liberation of Pavis. Gain Battle +5%.</p>";
     }
     if ($pavis == 14)
     {
          $rep = mt_rand (1,3);
          $hit = hitLoc();
          echo "<p>You fought with great glory during the Liberation of Pavis. Gain Honor Passion, Battle +10%, +$rep% Reputation, and a distinctive scar on your $hit.</p>";
     }
     if ($pavis > 14 && $pavis < 20)
     {
          $pavisloot = 100 * (mt_rand (1,6));
          $rep = mt_rand (1,3);
          echo "<p>You fought in the Liberation of Pavis and acclaimed Argrath as King of Pavis. Gain Loyalty (Argrath), Battle +10%, +$rep% Reputation, and $pavisloot L in war booty.</p>";
     }
     if ($pavis > 19)
     {
          echo "<p>After the Liberation of Pavis you were nearly killed or temporarily driven insane by Lunar demons when the Praxians came to Dragon Pass to destroy the New Lunar Temple. Gain Hate (Lunar Empire) and Spirit Combat +10%.</p>";
     }
}

function libSartar()
{
     $sartar = mt_rand (1,20);
     if ($sartar == 1)
     {
          $rep = mt_rand (1,3);
          echo "<p>You fought with great glory during the Liberation of Sartar. Gain Honor Passion, Loyalty (Sartar), +$rep% Reputation, and Battle +10%.</p>";
     }
     if ($sartar > 1 && $sartar < 6)
     {
          $hit = hitLoc();
          echo "<p>You were nearly killed in battle during the Liberation of Sartar. Gain a distinctive scar on your $hit and Battle +5%.</p>";
     }
     if ($sartar > 5 && $sartar < 11)
     {
          echo "<p>You fought in the Liberation of Sartar and survived. Gain Battle +5%.</p>";
     }
     if ($sartar > 10)
     {
          echo "<p>After the Liberation of Sartar you witnessed Kallyr Starbrow acclaimed as Prince of Sartar in Boldhome. Gain Loyalty (Sartar) and Battle +5%.</p>";
     }
}

function shaker()
{
     $shaker = mt_rand (1,20);
     if ($shaker == 1)
     {
          $rep = mt_rand (1,3);
          echo "<p>As the Shaker Priestess appointed a New King you were offered as sacrifice to the Cannibal Virgins but somehow survived. Gain Devotion (deity) and +$rep% Reputation.</p>";
     }
     if ($shaker > 1 && $shaker < 7)
     {
          echo "<p>You supported Onjur Fazzursson as king. Gain Loyalty (General Fazzur).</p>";
     }
     if ($shaker > 6 && $shaker < 19)
     {
          echo "<p>You witnessed the Shaker Priestess acclaim Unstey as King of Wintertop. Gain Loyalty (Shaker Temple).</p>";
     }
     if ($shaker > 18)
     {
          $hit = hitLoc();
          $rep = mt_rand (1,3);
          echo "<p>As the Shaker Priestess appointed a New King you were nearly killed fighting followers of King Pharandros. Gain Hate (King Pharandros), +$rep% Reputation, and a distinctive scar on your $hit.</p>";
     }
}

function death()
{
     $how = mt_rand (1,20);
     if ($how < 4)
     {
          echo "was killed in a personal feud with another clan. Gain Hate (other clan) or Loyalty (own clan).";
     }
     if ($how > 3 && $how < 7)
     {
          echo "was killed in battle with a neighboring land. Gain Hate (other Homeland).";
     }
     if ($how == 7)
     {
          echo "was killed by ";
          $chaos = mt_rand (1,4);
          if ($chaos == 1)
          {
               echo "broo. ";
          }
          if ($chaos == 2)
          {
               echo "disease spirit. ";
          }
          if ($chaos == 3)
          {
               echo "ogres. ";
          }
          if ($chaos == 4)
          {
               echo "scorpion men. ";
          }
          echo "Gain Hate (Chaos).";
     }
     if ($how > 7 && $how < 11)
     {
          echo "was killed by ";
          $who = elderRace();
          echo $who,". Gain Hate (",$who,").";
     }
     if ($how == 11)
     {
          echo "was killed by spirits.";
     }
     if ($how > 11 && $how < 14)
     {
          echo "was killed in an accident.";
     }
     if ($how > 13 && $how < 18)
     {
          echo "died of an illness.";
     }
     if ($how == 18)
     {
          echo "was killed by monster.";
     }
     if ($how == 19)
     {
          echo "died of unknown cause, just disappeared.";
     }
     if ($how == 20)
     {
          echo "was killed in a magical ceremony.";
     }
}

function boon()
{
     $rboon = mt_rand (1,20);
     if ($rboon < 3)
     {
          $friend = elderfriend();
          echo "<p>You befriended a $friend. Gain +10% Lore ($friend), and the creature you befriended remains friendly towards you.</p>";
     }
     if ($rboon > 2 && $rboon < 5)
     {
          echo "<p>You fell in love. Gain a Love (specific person) Passion.</p>";
     }
     if ($rboon > 4 && $rboon < 7)
     {
          echo "<p>You gained a follower. Perhaps it is a free person who carries your shield and other weapons into battle. Perhaps it is a servant or slave who carries your stuff, makes your meals, or performs other manual labor.</p>";
     }
     if ($rboon > 6 && $rboon < 9)
     {
          echo "<p>You made a professional accomplishment. Gain +10% to any non-combat professional skill (choose this when you determine your adventurer's occupational skills) and add one year's income to your starting wealth.</p>";
     }
     if ($rboon > 8 && $rboon < 11)
     {
          $magic = heirloom(mt_rand (1,20));
          echo "<p>You were gifted with $magic Decide why you received it. If it was given to you by a person, gain a Loyalty (that person).</p>";
     }
     if ($rboon > 10 && $rboon < 13)
     {
          echo "<p>You gained the favor of your temple. Gain Loyalty (temple).</p>";
     }
     if ($rboon > 12 && $rboon < 15)
     {
          echo "<p>Your clan came strongly to your aid in a dispute with outsiders. Gain Loyalty (clan).</p>";
     }
     if ($rboon > 14 && $rboon < 17)
     {
          echo "<p>Your clan assigned you a hide of land for your services. Gain Loyalty (clan). Depending on your occupation, you may need to have tenants farm the land.</p>";
     }
     if ($rboon > 16 && $rboon < 19)
     {
          echo "<p>You gained the blessings of your ancestors. Gain either +10% to Love (family) or +10% to the Spirit Combat skill.</p>";
     }
     if ($rboon == 19)
     {
          echo "<p>You gained the blessing of your god. When you determine your cult, you start with 1 extra Rune point towards that god. Gain Devotion (deity).</p>";
     }
     if ($rboon == 20)
     {
          $pow = mt_rand (1,6) + mt_rand (1,6) + mt_rand (1,6);
          $cha = mt_rand (1,6) + mt_rand (1,6);
          echo "<p>You gained a spirit bound into an animal or item. It has a POW of $pow and a CHA of $cha.</p>";
     }
}




echo "<h2>Your grandparent's history</h2>";
echo "<p>Your grandparent was a(n) $grandocc from $homeland.</p>";
echo "<h3>Year 1561</h3>";
echo "<p>Your grandparents were born this year.</p>";
echo "<h3>Year 1582</h3>";
echo "<p>King Tarkalor and his wife the Feathered Horse Queen went to war with the Lunar Empire to aid the Old Tarshites, aided by Praxian and Esrolian mercenaries and volunteers. The Red Emperor personally led the Lunar Army and when the armies met at the Battle of Grizzly Peak, the Lunar Army swept the field with their vastly superior magicians. Both King Tarkalor and his Queen were killed.</p>";
echo "<p>Of special note, your parents were born by this year.</p>";

$y1582 = mt_rand (1,20);

if ($homeland == "esrolia" || $homeland == "prax") {
  $y1582 = $y1582 - 5;
} elseif ($homeland == "grazelands" || $homeland == "old Tarsh" || $homeland == "sartar") {
  $y1582 = $y1582 + 5;
}

$grizzlypeak = 0;

if ($y1582 < 11)
{
     echo "<p>Your grandparent was not present at the Battle of Grizzly Peak. </p>";
}    else
{
     echo "<p>Your grandparent was present at the Battle of Grizzly Peak. ";
     $grizzlypeak = mt_rand (1,20);
     if ($grandocc == "noble" || $grandocc == "priest")
     {
          $grizzlypeak = $grizzlypeak + 5;
     }
     if ($grizzlypeak < 11)
     {
          echo "They survived. ";
          if ($homeland == "Sartar" || $homeland == "Lunar Tarsh")
          {
               $aldachur = mt_rand (1,20);
               if ($aldachur < 19)
               {
                    if ($homeland == "Sartar")
                    {
                         echo "Your grandparent then participated in the battle of Alda-Chur and witnessed the Alda-Churi acclaim Tarkalors son Terasarin as Prince of Alda-Chur. Gain Loyalty (Sartar).</p>";
                    } else
                    {
                         echo "Your grandparent then participated in the battle of Alda-Chur and retreated home.</p>";
                    }
               } elseif ($aldachur == 19)
               {
                    echo "Your grandparent then died in the Battle of Alda-Chur.</p>";
                    $gpdead = 1;
               } else
               {
                    $rep = mt_rand (1,3);
                    echo "Your grandparent then died with great glory in the Battle of Alda-Chur. Gain Honor Passion and +$rep% Reputation.</p>";
                    $gpdead = 1;
               }
          } else 
          {
               echo "Your grandparent then went home.</p>";
          }   
     } elseif ($grizzlypeak < 16)
     {
          if ($homeland == "Lunar Tarsh")
          {
               echo "Your grandparent died in battle. Gain Loyalty (Red Emperor <i>or</i> King of Tarsh).</p>";
               $gpdead = 1;
          } else
          {
               echo "Your grandparent was killed by Lunar spirits. Gain Hate (Lunar Empire).</p>";
               $gpdead = 1;
          }
     } else
     {
          if ($homeland == "Lunar Tarsh")
          {
               $rep = mt_rand (1,3);
               echo "Your grandparent died fighting the royla bodyguard. Gain Honor Passion and +$rep Reputation.";
               $gpdead = 1;
          } else
          {
               $rep = mt_rand (1,3);
               echo "Your grandparent died with great glory defending the king and queen. Gain Honor Passion and Loyalty (Sartar) <i>or</i> Feathered Horse Queen). You have a famous ancestor and get +5% bonus to your Orate skill and +$rep% Reputation.</p>";
               $gpdead = 1; 
         }
     }
}

if ($early == "Yes")
{
     if (($homeland == "Esrolia" || $homeland == "Lunar Tarsh" || $homeland == "Sartar") && $gpdead != 1)
     {
          echo "<h3>Year 1591</h3>";
          echo "<p>The Kingdom of Sartar is invaded by the Lunar Empire with its Tarshite and Tusk Rider allies. Belintar the God-King secretly supports the Kingdom against the Lunar invasion, and the invasion is defeated by Prince Terasarin.</p>";
          $y1591 = mt_rand (1,20);
          if ($homeland == "Esrolia" || $homeland == "Lunar Tarsh" || $homeland == "Sartar")
          {
               $y1591 = $y1591 + 5;
          }
          if ($y1591 < 6)
          {
               echo "<p>Your grandparent was killed in battle in other lands. Gain Hate (Other Homeland).</p>";
               $gpdead = 1;
          }
          if ($y1591 > 5 && $y1591 < 11)
          {
               $sarinv = mt_rand (1,20);
               if ($sarinv < 5)
               {
                    $loot = 100 * (mt_rand (1,6));
                    echo "During the invasion your grandparent plundered Far Place. Gain $loot L.</p>";
               }
               if ($sarinv > 4 && $sarinv < 14)
               {
                    echo "Your grandparent survived the invasion of Sartar.</p>";
               }
               if ($sarinv > 13 && $sarinv < 19)
               {
                    echo "Your grandparent was killed in battle during the invasion of Sartar. Gain Honor Passion.</p>";
                    $gpdead = 1;
               }
               if ($sarinv > 18)
               {
                    $rep = mt_rand (1,3);
                    echo "Your grandparent died with great glory in battle during the invasion of Sartar. Gain Honor Passion, Devotion (deity), and +$rep% Reputation. ";
                    if ($homeland == "Sartar")
                    {
                         echo "Gain Hate (Lunar Empire).";
                    }
                    echo "</p>";
                    $gpdead = 1;
               }

          }

     }
}

if (($homeland == "Esrolia" || $homeland == "Grazelands" || $homeland == "Lunar Tarsh" || $homeland == "Sartar") && $gpdead != 1)
{
     echo "<h3>Year 1597</h3>";
     echo "<p>Lunar assassins killed members of the Sartar royal house in the Holy Country, and many got entangled in the cycles of murder and vengeance.</p>";

     $y1597 = mt_rand (1,20);
     if ($homeland == "Grazelands" || $homeland == "Old Tarsh" || $homeland == "Prax")
     {
          $y1597 = $y1597-5;
     }
     if ($grandocc == "noble" || $grandocc == "priest")
     {
          $y1597 = $y1597+5;
     }
     if ($y1597 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1597 == 10)
     {
          echo "<p>Your grandparent ";
          $cause = death();
          echo "</p>";
          $gpdead = 1;
     }
     if ($y1597 > 10 && $y1597 < 18)
     {
          echo "<p>Your grandparent fought in the Holy Country and survived.</p>";
     }
     if ($y1597 > 17 && $y1597 < 20)
     {
          echo "<p>Your grandparent fought in the Holy Country, witnessed murder of a member of the Sartar royal house. Gain Hate (Lunar Empire).</p>";
     }
     if ($y1597 > 19)
     {
          if ($homeland == "Lunar Tarsh")
          {
               echo "<p>Your grandparent died with great glory trying to kill a member of the Sartar royal house. Gain Loyalty (Red Emperor) and +5% Orate skill because of your famous ancestor.</p>";
               $gpdead = 1;
          } else
          {
               $rep = mt_rand (1,3);
               echo "<p>Your grandparent died defending a member of the Sartar royal house. Gain Loyalty (Sartar) and +$rep% Reputation. Gain a +5% bonus to your Orate skill because of your famous ancestor.</p>";
               $gpdead = 1;
          }
     }
}

if ($early == "Yes")
{
     if (($homeland == "Sartar") && $gpdead != 1)
     {
          $y1600 = mt_rand (1,20);
          if ($grandocc == "noble" || $grandocc == "priest")
          {
               $y1600 = $y1600 + 5;
          }
          if ($y1600 < 2)
          {
               echo "<p>Your grandparent ";
               $cause = death();
               echo ".</p>";
               $gpdead = 1;
          }
          if ($y1600 > 1 && $y1600 < 20)
          {
               echo "<p>A normal year. Gain +10% in one of a $grandocc's occupational skills.</p>";
          }
          if ($y1600 > 19)
          {
               echo "<p>Your grandparent witnessed King Terasarin killed by dinosaur. Gain Fear (dinosaurs).</p>";
          }
     }
}

if ($gpdead != 1)
{
     echo "<h3>Year 1602</h3><p>The Lunar army invaded the kingdom of Sartar with great success, although at high cost, seizing the supposedly impregnable capital city by force and extinguishing the Flame of Sartar that united the legendary kingdom.</p>";
     $y1602 = mt_rand (1,20);
     if ($homeland == "Lunar Tarsh")
     {
          $y1602 = $y1602 + 5;
     }
     if ($homeland == "Sartar")
     {
          $y1602 = $y1602 + 10;
     }
     if ($y1602 < 11)
     {
          echo "<p>A normal year.</p>";
     } else
     {
          $boldhome = mt_rand (1,20);
          if ($homeland == "Sartar")
          {
               $boldhome = $boldhome + 5;
               if ($grandocc == "noble" || $grandocc == "priest" || $grandocc == "warrior")
               {
                    $boldhome = $boldhome + 5;
               }
          }
          if ($boldhome < 5)
          {
               $loot = 100 * (mt_rand (1,6));
               echo "Your grandparent plundered Boldhome. Gain $loot L.</p>";
          }
          if ($boldhome > 4 && $boldhome < 14)
          {
               echo "Your grandparent participated in the Boldhome Campaign and survived.</p>";
          }
          if ($boldhome > 13 && $boldhome < 18)
          {
               echo "Your grandparent was killed in battle in the Boldhome Campaign. Gain Honor Passion.</p>";
               $gpdead = 1;
          }
          if ($boldhome > 17 && $boldhome < 20)
          {
               echo "Your grandparent participated in the Boldhome Campaign and was devoured by the Crimson Bat. Your grandparent's soul no longer exists. Gain Hate (Chaos) at 70% or Hate (Lunar Empire) at 70% or add +20% to one of those Passions.</p>";
               $gpdead = 1;
          }
          if ($boldhome > 19)
          {
               $rep = mt_rand (1,3);
               echo "Your grandparent died with great glory in the Battle of Boldhome. Gain Honor Passion and Devotion (deity), and +$rep% Reputation. ";
               if ($homeland == "Sartar")
               {
                    echo "Gain Hate (Lunar Empire).";
               }
               echo "</p>";
               $gpdead = 1;
          }
     }
}

if (($homeland == "Esrolia" || $homeland == "Lunar Tarsh" || $homeland == "Sartar") && $gpdead != 1)
{
     echo "<h3>Interim Years (1603-1604)</h3>";
     echo "<p>After the Boldhome Campaign, the Lunar Empire dominated Dragon Pass. Old rivalries reignited, and the Lunar authorities encouraged the tribes to kill each other off.</p>";
     $y1603 = mt_rand (1,20);
     if ($homeland == "Esrolia" || $homeland == "Lunar Tarsh")
     {
          $y1603 = $y1603 - 5;
     }
     if ($homeland == "Sartar")
     {
          $y1603 = $y1603 + 5;
     }
     if ($y1603 < 9)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1603 > 8 && $y1603 < 11)
     {
          echo "<p>Your grandparent ";
          $cause = death();
          echo ".</p>";
          $gpdead = 1;
     }
     if ($y1603 > 10 && $y1603 < 16)
     {
          echo "<p>Your grandparent survived despite widespread conflict and feuds.</p>";
     }
     if ($y1603 == 16)
     {
          echo "<p>Resettled in New Pavis to escape Dragon Pass.</p>";
          $homeland = "Prax";
     }
     if ($y1603 > 16 && $y1603 < 19)
     {
          echo "<p>Your grandparent was killed by Telmori. Gain Hate (Telmori).</p>";
          $gpdead = 1;
     }
     if ($y1603 > 18)
     {
          echo "<p>Your grandparent was killed by rival tribe. Gain Hate (other tribe).</p>";
          $gpdead = 1;
     }
}
echo "<p>1604 is the year of your adventurer's birth, unless you have chosen to be older or younger. Your adventurer will be 21 in 1625, the year this game is set.</p>";
if (($homeland == "Esrolia" || $homeland == "Grazelands" || $homeland == "Lunar Tarsh" || $homeland == "Sartar") && $gpdead != 1)
{
     echo "<h3>Year 1605</h3>";
     echo "<p>A major thrust by the Lunar army to invade the Holy Country, striking at heavily populated Esrolia. Countering with magical strength, the god-king Belintar stopped the Lunars by inflicting a decisive and humiliating defeat.</p>";
     $y1605 = mt_rand (1,20);
     if ($homeland == "Old Tarsh")
     {
          $y1605 = $y1605 - 10;
     }
     if ($homeland == "Prax" || $homeland == "Sartar")
     {
          $y1605 = $y1605 - 5;
     }
     if ($homeland == "Esrolia")
     {
          $y1605 = $y1605 + 10;
     }
     if ($y1605 < 6)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1605 > 5 && $y1605 < 11)
     {
          $y1603 = mt_rand (1,20);
          if ($homeland == "Esrolia" || $homeland == "Lunar Tarsh")
          {
               $y1603 = $y1603 - 5;
          }
          if ($homeland == "Sartar")
          {
               $y1603 = $y1603 + 5;
          }
          if ($y1603 < 9)
          {
               echo "<p>A normal year.</p>";
          }
          if ($y1603 > 8 && $y1603 < 11)
          {
               echo "<p>Your grandparent ";
               $cause = death();
               echo ".</p>";
               $gpdead = 1;
          }
          if ($y1603 > 10 && $y1603 < 16)
          {
               echo "<p>Your grandparent survived despite widespread conflict and feuds.</p>";
          }
          if ($y1603 == 16)
          {
               echo "<p>Resettled in New Pavis to escape Dragon Pass.</p>";
               $homeland = "Prax";
          }
          if ($y1603 > 16 && $y1603 < 19)
          {
               echo "<p>Your grandparent was killed by Telmori. Gain Hate (Telmori).</p>";
               $gpdead = 1;
          }
          if ($y1603 > 18)
          {
               echo "<p>Your grandparent was killed by rival tribe. Gain Hate (other tribe).</p>";
               $gpdead = 1;
          }
     }
     if ($y1605 > 10 && $y1605 < 16)
     {
          echo "<p>Your grandparent fought in the Feint to the Sea Campaign ";
          $feint = mt_rand (1,20);
          if ($feint < 18)
          {
               echo "and survived.</p>";
          }
          if ($feint > 17 && $feint < 20)
          {
               echo "and was killed at the siege of Karse.";
               if ($homeland == "Lunar Tarsh")
               {
                    echo " Gain Loyalty (Fazzur Wideread).";
               }
               echo "</p>";
               $gpdead = 1;
          }
          if ($feint > 19)
          {
               echo "and died with great glory. Gain Honor Passion and +1D3% Reputation.";
               if ($homeland == "Lunar Tarsh")
               {
                    echo " Gain Loyalty (Fazzur Wideread).";
               }
               echo "</p>";
               $gpdead = 1;
          }
     }
     if ($y1605 > 15)
     {
          $building = mt_rand (1,20);
          echo "<p>";
          if ($homeland == "Lunar Tarsh")
          {
               $ybuilding = $building - 5;
          }
          if ($homeland == "Esrolia")
          {
               $ybuilding = $building + 5;
          }
          if ($building < 6)
          {
               echo "Your grandparent was killed at the Building Wall Batlle by Belintar's magic. Gain Hate (Esrolia).</p>";
               $gpdead = 1;
          }
          if ($building > 5 && $building < 10)
          {
               echo "Your grandparent was killed in the Building Wall Battle.</p>";
               $gpdead = 1;
          }
          if ($building > 9 && $building < 19)
          {
               echo "Your grandparent fought in the Building Wall Battle and survived.</p>";
          }
          if ($building > 18 && $building < 20)
          {
               echo "Your grandparent was killed in the Building Wall Battle when Belintar raised the wall. Gain Devotion (deity).</p>";
               $gpdead = 1;
          }
          if ($building > 19)
          {
               $rep = mt_rand (1,3);
               $loot = 100 * (mt_rand (1,6));
               echo "Your grandparent was blessed by Belintar at the Building Wall Battle. Gain +$rep% Reputation, $loot L and Loyalty (Holy Country) at 70% or +20% if your adventurer already has it.</p>";
          }
     }
}
echo "<h2>Your parent's history</h2>";
echo "<p>Your parent was a(n) $parentocc from $homeland.</p>";
if ($early == 1)
{
     if ($homeland == "Esrolia" || $homeland == "Grazelands")
     {
          $y1607 = mt_rand (1,20);
          if ($homeland == "Esrolia" || $homeland == "Grazelands")
          {
               $y1607 = mt_rand (1,20);
               echo "<h3>Year 1607</h3>";
               echo "<p>Esrolia raids Grazelands. ";
               if ($homeland == "Esrolia")
               {
                    $y1607 = $y1607 - 5;
               }
               if ($homeland == "Grazelands")
               {
                    $y1607 = $y1607 + 5;
               }
               if ($y1607 < 2)
               {
                    echo "<p>It was a normal year for your parent. Gain +10% in one of a $parentocc's occupational skills.</p>";
               }
               if ($y1607 > 1 && $y1607 < 6)
               {
                    $flip = mt_rand (1,2);
                    if ($flip == 1)
                    {
                         $pas = "Loyalty (Esrolia)";
                    } else
                    {
                         $pas = "Honor Passion";
                    }
                    echo "<p>Your parent was killed in battle. Gain $pas.</p>";
               }
               if ($y1607 > 5 && $y1607 < 16)
               {
                     echo "<p>Your parent survived the raiding.</p>";
               }
               if ($y1607 > 15 && $y1607 < 20)
               {
                    $flip = mt_rand (1,2);
                    if ($flip == 1)
                    {
                         $pas = "Loyalty (Feathered Horse Queen)";
                    } else
                    {
                         $pas = "Honor Passion";
                    }
                    echo "<p>Your parent was killed in battle. Gain $pas.</p>";
               }
               if ($y1607 > 19)
               {
                    echo "<p>It was a normal year for your parent. Gain +10% in one of a $parentocc's occupational skills.</p>";
               }
          }
     }
}

if (($homeland == "Lunar Tarsh" || $homeland == "Prax") && $pdead != 1)
{
     echo "<h3>Year 1608</h3>";
     echo "<p>The Lunar Empire invaded Prax. The Lunar army hopped from oasis to oasis but was raided and harried until it accepted peace before being allowed to enter the Paps. Despite propaganda, this was a nomad victory.</p>";
     $y1608 = mt_rand (1,20);
     if ($homeland == "Esrolia" || $homeland == "Grazelands" || $homeland == "Old Tarsh")
     {
          $y1608 = $y1608 - 5;
     }
     if ($homeland == "Prax")
     {
          $y1608 = $y1608 + 5;
     }
     if ($y1608 < 10 || ($y1608 > 11 && $y1608 < 16))
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1608 > 9 && $y1608 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1608 > 15)
     {
          $firstinvasion = mt_rand (1,20);
          if ($homeland == "Lunar Tarsh")
          {
               $firstinvasion = $firstinvasion - 10;
          }
          if ($homeland == "Prax")
          {
               $firstinvasion = $firstinvasion + 10;
          }
          if ($firstinvasion < 10)
          {
               echo "<p>Your parent survived numerous ambushes in the First Invasion of Prax. Gain Hate (Prax).</p>";
          }
          if ($firstinvasion > 9 && $firstinvasion < 12)
          {
               echo "<p>Your parent died skirmishing in the plains during the First Invasion of Prax. ";
               if ($homeland == "Lunar Tarsh")
               {
                    echo "Gain Hate (Prax).</p>";
               }
               if ($homeland == "Prax")
               {
                    echo "Gain Hate (Lunar Empire).</p>";
               }
          }
          if ($firstinvasion > 11 && $firstinvasion < 16)
          {
               echo "<p>Your parent fought in the First Invasion of Prax and survived.</p>";
          }
          if ($firstinvasion > 15 && $firstinvasion < 19)
          {
               echo "<p>Your parent witnessed the Lunar submission to the Pap Priestesses after the First Invasion of Prax. ";
               if ($homeland == "Prax")
               {
                    echo "Gain Loyalty (your tribe).</p>";
               } else
               {
                    echo "Gain Devotion (deity).</p>";
               }
          }
          if ($firstinvasion > 18 && $firstinvasion < 20)
          {
               echo "<p>Your parent was killed in battle during the First Invasion of Prax.</p>";
               $pdead = 1;
          }
          if ($firstinvasion > 19)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent died with great glory during the First Invasion of Prax. Gain Honor Passion and +$rep% Reputation.</p>";
               $pdead = 1;
          }
     }
}

if ($early == 1 && $pdead != 1 && ($homeland == "Lunar Tarsh" || $homeland == "Old Tarsh" || $homeland == "Sartar"))
{
     $y1609 = mt_rand (1,20);
     echo "<h3>Year 1609</h3>";
     echo "<p>Persistent raiding by the tusk riders rallied their foes, and many lands (Sartar, Tarsh, Trolls) sent their best hunters and warriors to hunt down the raiders. Success was, as usual, questionable.</p>";
     if ($homeland == "Lunar Tarsh" || $homeland == "Old Tarsh" || $homeland == "Sartar")
     {
          $y1609 = $y1609 + 2;
     }
     if ($y1609 < 10)
     {
          echo "<p>It was a normal year for your parent. Gain +10% in one of a $parentocc's occupational skills.</p>";
     }
     if ($y1609 > 9 && $y1609 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1609 > 11 && $y1609 < 16)
     {
          echo "<p>It was a normal year for your parent. Gain +10% in one of a $parentocc's occupational skills.</p>";
     }
     if ($y1609 > 15)
     {
          $boarhunt = mt_rand (1,20);
          if ($parentocc == "hunter" || $parentocc == "noble" || $parentocc == "priest" || $parentocc == "warrior")
          {
               $boarhunt = $boarhunt + 5;
          }
          if ($boarhunt < 2)
          {
               $rep = mt_rand (1,5);
               $flip1 = mt_rand (1,2);
               if ($flip1 == 1)
               {
                    $kill = "tribal war leader";
               } else
               {
                    $kill = "clan chieftain";
               }
               $flip2 = mt_rand (1,2);
               if ($flip2 == 1)
               {
                    $gain = "Hate (" . $kill . ")";
               } else
               {
                    $gain = "Loyalty (Ivory Plinth)";
               }
               echo "<p>Your parent participated in the Boar Hunt, and died with great glory slaying a $kill while defending the Stinking Forest. Gain $gain and +$rep% Reputation.</p>";
          }
          if ($boarhunt > 1 && $boarhunt < 6)
          {
               echo "<p>Your parent died fighting invaders in the Stinking Forest. Gain Hate ($homeland).</p>";
          }
          if ($boarhunt > 5 && $boarhunt < 11)
          {
               echo "<p>Your parent participated in the Boar Hunt and survived.</p>";
          }
          if ($boarhunt > 10 && $boarhunt < 13)
          {
               echo "<p>Your parent ";
               $cause = death();
               echo ".</p>";
               $pdead = 1;
          }
          if ($boarhunt > 12 && $boarhunt < 16)
          {
               $flip = mt_rand (1,2);
               if ($flip == 1)
               {
                    $gain = "Fear (Tusk Riders)";
               } else
               {
                    $gain = "Fear (Bloody Tusk)";
               }
               echo "<p>Your parent witnessed the bloody sacrifices and rituals at the Ivory Plinth. Gain $gain.</p>";
          }
          if ($boarhunt > 15 && $boarhunt < 18)
          {
               echo "<p>Your parent was sacrificed in a bloody ritual at the Ivory Plinth. Your parent's soul was bound to their hand as a slave spirit and can't be contacted until the soul is freed. Gain Hate (Tusk Riders)</p>";
          }
          if ($boarhunt > 15 && $boarhunt < 18)
          {
               echo "<p>Your parent was killed in a skirmish during the Boar Hunt. Gain Hate (Tusk Riders)</p>";
          }
          if ($boarhunt > 19)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent died with great glory dispatching Tusk Riders during the Boar Hunt. Gain Honor Passion and +$rep% Reputation.</p>";
          }

     }
}

if (($homeland == "Lunar Tarsh" || $homeland == "Prax") && $pdead != 1)
{
     echo "<h3>Year 1610</h3>";
     echo "<p>The Lunar army, this time better prepared and equipped, marched into Prax and defeated the nomads in battle, then occupied the surrendering city of Pavis. Jar-eel the Razoress, a Lunar demigoddess, came to Tarsh and liberated King Moirades to transcend his mortal coil. Although she later gave birth to Moirades' son, the king's eldest son Pharandros became King of Tarsh.</p>";
     $y1610 = mt_rand (1,20);
     if ($homeland == "Esrolia" || $homeland == "Grazelands" || $homeland == "Old Tarsh")
     {
          $y1610 = $y1610 - 10;
     }
     if ($homeland == "Sartar")
     {
          $y1610 = $y1610 - 5;
     }
     if ($homeland == "Prax")
     {
          $y1610 = $y1610 + 10;
     }
     if ($y1610 < 5)
     {
          if ($homeland == "Lunar Tarsh")
          {
               $jareel = mt_rand (1,20);
               if ($jareel < 15)
               {
                    echo "<p>Your parent acclaimed Pharandros as King. Gain Loyalty (Pharandros).</p>";
               }
               if ($jareel < 20 && $jareel > 14)
               {
                    echo "<p>Your parent witnessed Jar-eel elevate Pharandros as King. Gain Loyalty (Red Emperor).</p>";
               }
               if ($jareel > 19)
               {
                    echo "<p>Your parent was blessed by Jar-eel the Razoress. Gain Love (Jar-eel the Razoress).</p>";
               }
          } else
          echo "<p>A normal year.</p>";
     }
     if ($y1610 > 4 && $y1610 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1610 > 9 && $y1610 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1610 > 11)
     {
          $secondinvasion = mt_rand (1,20);
          if ($secondinvasion < 18)
          {
               echo "<p>Your parent fought in the Second Invasion of Prax and survived.</p>";
          }
          if ($secondinvasion > 17 && $secondinvasion < 20)
          {
               echo "<p>Your parent fought in the Second Invasion of Prax and was killed at the Battle of Moonbroth.</p>";
          }
          if ($secondinvasion > 19)
          {
               echo "<p>Your parent fought in the Second Invasion of Prax and died with great glory at the Battle of Moonbroth. Gain Honor Passion.</p>";
          }
     }
}

if (($homeland == "Grazelands" || $homeland == "Lunar Tarsh" || $homeland == "Prax" || $homeland == "Sartar") && $pdead != 1)
{
     echo "<h3>Year 1613</h3>";
     echo "<p>Outraged by the Lunar presence and urged on by social unrest, the Sartarites rebelled in strength and temporarily expelled the Lunar army. The Lunars regrouped, and under the leadership of General Fazzur Wideread soundly defeated the rebels. The Red Emperor appointed Fazzur Wideread the Governor-General of Dragon Pass.</p>";
     $y1613 = mt_rand (1,20);
     if ($homeland == "Esrolia" || $homeland == "Old Tarsh")
     {
          $y1613 = $y1613 - 10;
     }
     if ($homeland == "Grazelands" || $homeland == "Lunar Tarsh" || $homeland == "Prax")
     {
          $y1613 = $y1613 - 5;
     }
     if ($homeland == "Sartar")
     {
          $y1613 = $y1613 + 5;
     }
     if ($y1613 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1613 < 12 && $y1613 > 9)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1613 > 11)
     {
          $starbrow = mt_rand (1,20);
          if ($homeland == "Sartar")
          {
               $starbrow = $starbrow + 5;
          }
          if ($homeland == "Lunar Tarsh")
          {
               $starbrow = $starbrow - 5;
          }
          if ($starbrow < 6)
          {
               echo "<p>Your parent was killed in rebel uprising. Gain Hate (Sartar).</p>";
               $pdead = 1;
          }
          if ($starbrow > 5 && $starbrow < 16)
          {
               echo "<p>Your parent fought during Starbrow's Rebellion and survived.";
               if ($homeland == "Lunar Tarsh")
               {
                    echo " Gain Loyalty (General Fazzur).";
               }
               echo "</p>";
          }
          if ($starbrow == 16)
          {
               echo "<p>Your parent was killed in Starbrow's Rebellion. Gain Honor Passion.</p>";
               $pdead = 1;
          }
          if ($starbrow == 17)
          {
               echo "<p>Your parent was killed by Lunar magic during Starbrow's Rebellion. Gain Hate (Lunar Empire).</p>";
               $pdead = 1;
          }
          if ($starbrow == 18)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent aided Kallyr Starbrow's escape from Sartar after Starbrow's Rebellion. Gain Loyalty (Sartar) and +$rep% Reputation.</p>";
          }
          if ($starbrow == 19)
          {
               echo "<p>Your parent resettled in New Pavis after Starbrow's Rebellion was defeated.</p>";
               $homeland = "Prax";
          }
          if ($starbrow > 19)
          {
               $starout = mt_rand (1,6);
               echo "<p>Your parent was outlawed by the Lunars for $starout years after Starbrow's Rebellion was defeated. Gain Hate (Lunar Empire)</p>";
          }
     }
}

if (($homeland == "Grazelands" || $homeland == "Lunar Tarsh" || $homeland == "Old Tarsh") && $pdead != 1)
{
     echo "<h3>Year 1615</h3>";
     echo "<p>A squabble between the Grazelanders and the Lunars broke into open war. The former, aided by King Ironhoof and his Beast Men, managed to evade and frustrate two massive invasion forces.</p>";
     $y1615 = mt_rand (1,20);
     if ($homeland == "Prax")
     {
          $y1615 = $y1615 - 10;
     }
     if ($homeland == "Sartar" || $homeland == "Esrolia")
     {
          $y1615 = $y1615 - 5;
     }
     if ($homeland == "Lunar Tarsh")
     {
          $y1615 = $y1615 + 5;
     }
     if ($homeland == "Grazelands")
     {
          $y1615 = $y1615 + 10;
     }
     if ($y1615 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1615 > 9 && $y1615 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1615 > 11)
     {
          $grazecamp = mt_rand (1,20);
          if ($homeland == "Lunar Tarsh")
          {
               $grazecamp = $grazecamp - 5;
          }
          if ($homeland == "Grazelands")
          {
               $grazecamp = $grazecamp + 5;
          }
          if ($grazecamp < 6)
          {
               echo "<p>Your parent was killed by Beast Men during the Grazeland Campaign. Gain Hate (Beast Men).</p>";
               $pdead = 1;
          }
          if ($grazecamp > 5 && $grazecamp < 16)
          {
               echo "<p>Your parent fought in the Grazeland Campaign and survived.</p>";
          }
          if ($grazecamp > 15 && $grazecamp < 20)
          {
               echo "<p>Your parent fought in the Grazeland Campaign and was killed in battle. Gain Honor Passion.</p>";
               $pdead = 1;
          }
          if ($grazecamp > 19)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent died with great glory in the Grazeland Campaign defending the Feathered Horse Queen. Gain Loyalty (Feathered Horse Queen) and +$rep% Reputation.</p>";
               $pdead = 1;
          }
     }
}

if (($homeland == "Esrolia" || $homeland == "Prax") && $pdead != 1)
{
     echo "<h3>Year 1616</h3>";
     echo "<p>A large army from the Holy Country was ambushed and slaughtered by the Ditali barbarians. At the same time, Harrek the Berserk and his Wolf Pirates destroyed the Holy Country navy. The god-king Belintar disappeared and the Tournament of the Masters of Luck and Death failed to produce a replacement.</p><p>In Prax, a former slave of the Bison people founded the White Bull Society; many Praxians of all tribes flocked to join it.</p>";
     $y1616 = mt_rand (1,20);
     if ($homeland == "Lunar Tarsh" || $homeland == "Prax")
     {
          $y1616 = $y1616 - 10;
     }
     if ($homeland == "Old Tarsh" || $homeland == "Sartar")
     {
          $y1616 = $y1616 - 3;
     }
     if ($homeland == "Grazelands")
     {
          $y1616 = $y1616 - 2;
     }
     if ($homeland == "Esrolia")
     {
          $y1616 = $y1616 + 10;
     }
     if ($y1616 < 2)
     {
          if ($homeland == "Prax")
          {
               $whitebull = mt_rand (1,20);
               if ($whitebull < 6)
               {
                    echo "<p>Your parent refused to join the White Bull Society.</p>";
               }
               if ($whitebull > 5 && $whitebull < 20)
               {
                    echo "<p>Your parent joined the White Bull Society. Gain Loyalty (White Bull).</p>";
               }
               if ($whitebull == 20)
               {
                    echo "<p>Your parent rode with the White Bull. Gain Loyalty (White Bull) and Devotion (deity).</p>";
               }
          } else
          {
               echo "<p>A normal year.</p>";
          }
     }
     if ($y1616 > 1 && $y1616 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1616 > 9 && $y1616 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1616 > 11 && $y1616 < 16)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1616 > 15 && $y1616 < 19)
     {
          $lionking = mt_rand (1,20);
          if ($lionking < 16)
          {
               echo "<p>Your parent fought in the Lion King's Feast and survived.</p>";
          }
          if ($lionking > 15 && $lionking < 20)
          {
               echo "<p>Your parent fought in the Lion King's Feast and was killed in battle. Gain Loyalty (Esrolia).</p>";
          }
          if ($lionking == 20)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent died with great glory in the Lion King's Feast. Gain Hate (Western Barbarians) and +$rep% Reputation.</p>";
          }
     }
     if ($y1616 > 18)
     {
          $wolfpirate = mt_rand (1,20);
          if ($wolfpirate < 11)
          {
               echo "<p>Your parent fought the Wolf Pirates Navy and survived.</p>";
          }
          if ($wolfpirate > 10 && $wolfpirate < 15)
          {
               echo "<p>Your parent fought the Wolf Pirates Navy and drowned at sea. Gain Hate (Wolf Pirates).</p>";
               $pdead = 1;
          }
          if ($wolfpirate > 14 && $wolfpirate < 19)
          {
               echo "<p>Your parent fought the Wolf Pirates Navy and was killed in battle. Gain Loyalty (Holy Country).</p>";
               $pdead = 1;
          }
          if ($wolfpirate == 19)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent fought the Wolf Pirates Navy. They saw Harrek the Berserk and survived. Gain Fear (Harrek the Berserk) and +$rep% Reputation.</p>";
          }
          if ($wolfpirate == 20)
          {
               echo "<p>Your parent fought the Wolf Pirates Navy and was killed by Harrek the Berserk. Gain Hate (Harrek the Berserk).</p>";
               $pdead = 1;
          }
     }
}

if ($homeland == "Esrolia" && $pdead != 1)
{
     echo "<h3>Year 1618</h3>";
     echo "<p>The Solanthi warlord Greymane led a massive army through Ditali and deep into the Holy Country, taking great plunder and avoiding a decisive battle.</p>";
     $y1618 = mt_rand (1,20);
     if ($homeland == "Esrolia")
     {
          $y1618 = $y1618 + 10;
     } else
     {
          $y1618 = $y1618 - 5;
     }
     if ($y1618 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1618 > 9 && $y1618 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1618 > 11 && $y1618 < 16)
     {
          echo "<p>Your parent stayed in Nochet and watched the Western Barbarians pillage the countryside.</p>";
     }
     if ($y1618 > 15)
     {
          $greymane = mt_rand (1,20);
          if ($greymane < 16)
          {
               echo "<p>Your parent fought Greymane's Great Raid and survived.<p>";
          }
         if ($greymane > 15 && $greymane < 20)
          {
               echo "<p>Your parent fought Greymane's Great Raid and was killed by raiders. Gain Hate (Western Barbarians).<p>";
               $pdead = 1;
          }
         if ($greymane == 20)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent died with great glory during Greymane's Great Raid. Gain Honor Passion and +$rep% Reputation.<p>";
               $pdead = 1;
          }
     }
}

if (($homeland == "Lunar Tarsh" || $homeland == "Prax" || $homeland == "Sartar") && $pdead != 1)
{
     echo "<h3>Year 1619</h3>";
     echo "<p>The Lunar army invaded northern Hendriking lands and took the city of Karse. King Broyan of the Hendrikings retreated to the fortress temple of Whitewall with his companions and withstood every Lunar attempt to take the city. The Crimson Bat is sent to Dragon Pass to strike fear into any who would rebel against the Emperor.</p>";
     $y1619 = mt_rand (1,20);
     if ($homeland == "Esrolia" || $homeland == "Grazelands" || $homeland == "Old Tarsh")
     {
          $y1619 = $y1619 - 10;
     }
     if ($homeland == "Prax")
     {
          $y1619 = $y1619 - 5;
     }
     if ($homeland == "Sartar")
     {
          $y1619 = $y1619 + 5;
     }
     if ($homeland == "Lunar Tarsh")
     {
          $y1619 = $y1619 + 10;
     }
     if ($y1619 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1619 > 9 && $y1619 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1619 == 12)
     {
          echo "<p>Your parent was fed to the Crimson Bat. Your parent's soul no longer exists. Gain Hate (Chaos) or Hate (Lunar Empire) starting at 70% or add +20% to one of them if you already have both Passion.</p>";
          $pdead = 1;
     }
     if ($y1619 > 12)
     {
          $hendriking = mt_rand (1,20);
          if ($hendriking < 17)
          {
               echo "<p>Your parent fought in the Hendriking Campaign and survived.</p>";
          }
          if ($hendriking > 16 && $hendriking < 20)
          {
               echo "<p>Your parent fought in the Hendriking Campaign and was killed in battle.";
               if ($homeland == "Lunar Tarsh")
               {
                    echo " Gain Loyalty (General Fazzur).";
               }
               echo "</p>";
               $pdead = 1;
          }
          if ($hendriking == 20)
          {
               $rep = mt_rand (1,3);
               echo "<p>Your parent died with great glory in the Hendriking Campaign. Gain Honor Passion and +$rep% Reputation.";
               if ($homeland == "Lunar Tarsh")
               {
                    echo " Gain Loyalty (General Fazzur).";
               }
               echo "</p>";
               $pdead = 1;
          }
     }
}

if (($homeland == "Lunar Tarsh" || $homeland == "Prax" || $homeland == "Sartar") && $pdead != 1)
{
     echo "<h3>Year 1620</h3>";
     echo "<p>The Lunar army decisively defeated the Malkonwal army in battle and accepted their surrender. The Hendriking king and his companions held out at Whitewall, defeating everything the Lunar army threw against them, including the Crimson Bat.</p>";
     $y1620 = mt_rand (1,20);
     if ($homeland == "Esrolia" || $homeland == "Grazelands" || $homeland == "Old Tarsh")
     {
          $y1620 = $y1620 - 10;
     }
     if ($homeland == "Prax")
     {
          $y1620 = $y1620 - 5;
     }
     if ($homeland == "Lunar Tarsh")
     {
          $y1620 = $y1620 + 10;
     }
     if ($y1620 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1620 > 9 && $y1620 < 12)
     {
          echo "<p>Your parent ";
          $cause = death();
          echo ".</p>";
          $pdead = 1;
     }
     if ($y1620 > 11)
     {
          $heortland = mt_rand (1,20);
          if ($homeland == "Sartar")
          {
               $heortland = $heortland - 5;
          }
          if ($homeland == "Lunar Tarsh")
          {
               $heortland = $heortland + 5;
          }
          if ($heortland < 2)
          {
               echo "<p>Your parent fought in the Heortland Campaign and was devoured by the Crimson Bat. Your parent's soul no longer exists. Gain Hate (Chaos) or Hate (Lunar Empire) starting at 70% or add +20% to one if you already have both Passions.</p>";
               $pdead = 1;
          }
          if ($heortland == 2)
          {
               echo "<p>Your parent was killed in battle fighting the Lunar Army in the Heortland Campaign. Gain Hate (Lunar Empire).</p>";
               $pdead = 1;
          }
          if ($heortland > 2 && $heortland < 10)
          {
               echo "<p>Your parent fought in the Heortland Campaign and survived.</p>";
          }
          if ($heortland > 9 && $heortland < 12)
          {
               echo "<p>Your parent fought in the Heortland Campaign but ";
               $cause = death();
               echo ".</p>";
               $pdead = 1;
          }
          if ($heortland > 11 && $heortland < 17)
          {
               echo "<p>Your parent fought in the Heortland Campaign and survived.</p>";
          }
          if ($heortland > 16 && $heortland < 19)
          {
               echo "<p>Your parent was killed in battle during the Heortland Campaign.</p>";
               $pdead = 1;
          }
          if ($heortland > 18)
          {
               echo "<p>During the Heortland Campaign your parent was devoured by the Crimson Bat after King Broyan repelled it. Your parent's soul no longer exists. Gain Hate (Chaos) or Hate (Lunar Empire) starting at 70% or add +20% to one if you already have both Passions.</p>";
               $pdead = 1;
          }
     }
}

if ($pdead != 1)
{
     echo "<h3>Year 1621</h3>";
     echo "<p>A Giant's Cradle floated down the Zola Fel to the sea. The Lunar army's attempts to seize it were thwarted by its defenders.</p>";
     echo "<p>After more than two years of siege and tremendous cost in blood, treasure, and souls, the sacred fortress of Whitewall and its Orlanthi defenders fell to the Lunar army. The gods Orlanth and Ernalda were proclaimed dead and the Great Winter came to Dragon Pass, the Holy Country, and Prax. The Red Emperor decreed a full year of celebration.</p>";
     $y1621 = mt_rand (1,20);
     if ($homeland == "Sartar" || $homeland == "Lunar Tarsh")
     {
          $y1621 = $y1621 - 5;
     } else
     {
          $y1621 = $y1621 + 5;
     }
     if ($y1621 < 3)
     {
          $whitewall = mt_rand (1,20);
          if ($homeland == "Lunar Tarsh")
          {
               $whitewall = $whitewall - 5;
          }
          if ($homeland == "Sartar")
          {
               $whitewall = $whitewall + 5;
          }
          if ($whitewall < 6)
          {
               echo "<p>Your parent was killed in assault on Whitewall.</p>";
               $pdead = 1;
          }
          if ($whitewall > 5 && $whitewall < 16)
          {
               echo "<p>Your parent was present at the Fall of Whitewall and survived.</p>";
          }
          if ($whitewall > 15 && $whitewall < 20)
          {
               echo "<p>Your parent was killed in battle at the Fall of Whitewall. Gain Devotion (deity).</p>";
               $pdead = 1;
          }
          if ($whitewall > 19)
          {
               echo "<p>Your parent escaped the Fall of Whitewall with King Broyan. Gain Devotion (deity) starting at 70% or add +20% if you already have that Passion.</p>";
          }
     } else
     {
          $gwy1 = mt_rand (1,20);
          if ($homeland == "Lunar Tarsh")
          {
               $gwy1 = $gwy1+ 10;
          }
          if ($homeland == "Esrolia")
          {
               $gwy1= $gwy1+ 5;
          }
          if ($gwy1 < 5)
          {
               echo "<p>Your parent froze to death during the Great Winter, making sure others were warm. Gain Love (Family) +20%.</p>";
               $pdead = 1;
          }
          if ($gwy1 > 4 && $gwy1 < 10)
          {
               echo "<p>Your parent starved to death during the Great Winter, making sure others were fed. Gain Love (Family) +20%.</p>";
               $pdead = 1;
          }
          if ($gwy1 > 9 && $gwy1 < 12)
          {
               echo "<p>Your parent ";
               $cause = death();
               echo ".</p>";
               $pdead = 1;
          }
          if ($gwy1 > 11)
          {
               echo "<p>Your parent survived the first year of the Great Winter.</p>";
          }
     }     
}

echo "<h2>Your History</h2>";
echo "<p>An adventurer aged 21 in 1625 would have come of age in 1622.</p>";

echo "<h3>Year 1622</h3>";
echo "<p>The Red Emperor appointed Tatius the Bright as the Lunar governor-general of Dragon Pass, replacing Fazzur Wideread. King Broyan reemerged and his Hendriking tribe rose in rebellion, joined by many volunteers. Hordes of scorpion men emerged from Larnste's Footprint, serving the Chaos demigoddess called the Queen of Jab.</p>";
echo "<p>The Great Winter continued until the Battle of the Auroch Hills, when Broyan's rebel army ambushed and defeated the Lunar army by partially reviving Orlanth and Ernalda. The pro-Lunar queen of Esrolia was overthrown in a <i>coup d'&ecirc;tat</i> and civil war erupted in that land.</p>";
$y1622 = mt_rand (1,20);
if ($homeland == "Prax" || $homeland == "Old Tarsh")
{
     $y1622 = $y1622 - 5;
}
if ($homeland == "Esrolia")
{
     $y1622 = $y1622 + 3;
}
if ($homeland == "Sartar")
{
     $y1622 = $y1622 + 5;
}
if ($y1622 < 4)
     {
          echo "<p>You almost ";
          $cause = death();
          echo ".</p>";
     }
if ($y1622 > 3 && $y1622 < 15)
{
     $gwy2 = mt_rand (1,20);
     if ($homeland == "Esrolia" || $homeland == "Lunar Tarsh")
     {
          $gwy2 = $gwy2 + 5;
     }
     if ($gwy2 < 6)
     {
          echo "<p>You nearly froze to death during the second year of the Great Winter, but was kept alive by ";
          $alive = mt_rand (1,6);
          if ($alive == "1")
          {
               echo "the love of another. Gain Love (individual).</p>";
          }
          if ($alive == "2")
          {
               echo "the sacrifices of your family. Gain Love (family) +20%.</p>";
          }
          if ($alive == "3")
          {
               echo "the murder and burning of enemies. Gain Hate (another clan or people).</p>";
          }
          if ($alive == "4")
          {
               echo "worshiping Oakfed to burn down local woods. Gain Hate (Aldryami).</p>";
          }
          if ($alive == "5")
          {
               echo "joining rebels and fighting in the Battle of the Auroch Hills. ";
               aurochHills();
          }
          if ($alive == "6")
          {
               echo "fleeing to Esrolia and fighting in the Civil War in Esrolia. ";
               civilwar();
          }
     }
     if ($gwy2 > 5 && $gwy2 < 11)
     {
          echo "<p>You nearly starved to death during the second year of the Great Winter, but was kept alive by ";
          $alive = mt_rand (1,6);
          if ($alive == "1")
          {
               echo "the sacrifices of your family. Gain Love (family).</p>";
          }
          if ($alive == "2")
          {
               echo "going into the service of your chief or king. Gain Loyalty (clan or tribe).</p>";
          }
          if ($alive == "3")
          {
               echo "stealing food from strangers. Gain Hate (another clan or people).</p>";
          }
          if ($alive == "4")
          {
               echo "stealing food from your clan. Reduce Loyalty (clan) by 20%.</p>";
          }
          if ($alive == "5")
          {
               echo "being fed by your cult. Gain Loyalty (temple).</p>";
          }
          if ($alive == "6")
          {
               echo "being fed by the Ernalda Temple. Gain Devotion (Ernalda).";
          }
     }
     if ($gwy2 > 10)
     {
          echo "<p>You survived the second year of the Great Winter.</p>";
     }
}
if ($y1622 > 14 && $y1622 < 20)
{
     echo "You fought in the Civil War in Esrolia. ";
     civilwar();
}
if ($y1622 > 19)
{
     echo "You fought in the Battle of the Auroch Hills. ";
     aurochHills();
}

echo "<h3>Year 1623</h3>";
echo "<p>The new Esrolian queen gained a new ally when King Broyan and his ragged army of volunteers arrived and defeated the Grazeland Horse Army (the Feathered Horse Queen was killed soon after by her own bodyguards). The Lunar Army arrived in Esrolia and besieged Queen Samastina and King Broyan in Nochet. In the north, a gigantic swarm of trolls, trollkin, insects, and darkness creatures crossed Dragon Pass <i>en route</i> to the Castle of Lead.</p>";
$y1623 = mt_rand (1,20);
if ($homeland == "Grazelands")
{
     $y1623 = $y1623 + 5;
}
if ($homeland == "Esrolia")
{
     $y1623 = $y1623 + 15;
}
if ($siege1623 != 1)
{
     if ($y1623 < 10)
     {
          echo "<p>A normal year.</p>";
     }
     if ($y1623 == 10)
     {
          echo "<p>You almost ";
          $cause = death();
          echo "</p>";
     }
     if ($y1623 > 10 && $y1623 < 13)
     {
          boon();
     }
     if ($y1623 > 12 && $y1623 < 15)
     {
          echo "<p>You were nearly killed by Troll raiders. Gain Hate (Trolls).</p>";
     }
     if ($y1623 > 14 && $y1623 < 17)
     {
          $civilstrife = mt_rand (1,20);
          if ($civilstrife < 6)
          {
               echo "<p>You were attacked and badly wounded by foreign solders or raiders. Pick a foreign culture (any homeland not your own or an immediate neighbor) and gain Hate (foreign culture).</p>";
          }
          if ($civilstrife > 5 && $civilstrife < 11)
          {
               echo "<p>You were attacked and badly wounded by members of a rival clan. Pick a neighboring clan. Your clans now have a feud over the incident. Gain Hate (rival clan).</p>";
          }
          if ($civilstrife > 10 && $civilstrife < 16)
          {
               echo "<p>You killed a member of a neighboring clan who now seek vengeance. Gain Hate (rival clan).</p>";
          }
          if ($civilstrife > 15)
          {
               echo "<p>You were nearly killed by members of an Elder Race. Gain Hate (Elder Race).</p>";
          }
     }
     if ($y1623 > 16)
     {
          $siege1623 = 1;
     }
}
if ($siege1623 == 1)
{
     $siegenoc = mt_rand (1,20);
     if ($homeland == "Grazelands" || $homeland == "Lunar Tarsh")
     {
          $siegenoc = $siegenoc - 5;
     }
     if ($homeland == "Esrolia" || $homeland == "Sartar")
     {
          $siegenoc = $siegenoc - 5;
     }
     if ($siegenoc < 2)
     {
          $rep = mt_rand (1,3);
          echo "<p>You fought with great glory in the Siege of Nochet. Gain Honor Passion and Battle +10%. Gain +$rep% Reputation.</p>";
     }
     if ($siegenoc > 1 && $siegenoc < 6)
     {
          echo "<p>You were badly wounded by Earth magic during the Siege of Nochet. Gain Hate (Esrolia).</p>";
     }
     if ($siegenoc > 5 && $siegenoc < 18)
     {
          echo "<p>You survived the Siege of Nochet. Gain Battle +5%.</p>";
          $pennel = 1;
     }
     if ($siegenoc == 18)
     {
          echo "<p>You were nearly killed or driven insane by Lunar magic during the Siege of Nochet. Gain Hate (Lunar Empire).</p>";
     }
     if ($siegenoc == 19)
     {
          $rep = mt_rand (1,3);
          echo "<p>You fought with great glory alongside King Broyan during the Siege of Nochet. Gain Honor Passion, Devotion (deity), Battle +10%, and +$rep% Reputation.</p>";
          $pennel = 1;
     }
     if ($siegenoc > 19)
     {
          $loot = 100 * (mt_rand (1,6));
          $rep = mt_rand (1,3);
          echo "<p>You were blessed by Queen Samastina during the Siege of Nochet. Gain Loyalty (Queen Samastina), Battle +5%, +$rep% Reputation, and $loot L worth of gifts from the queen.</p>";
          $pennel = 1;
     }
}

echo "<h3>Year 1624</h3>";
echo "<p>A new planet (called the Boat Planet) appeared in the Sky, prophesizing doom and change. Harrek the Berserk and his Wolf Pirates arrived in the Holy Country after circumnavigating the world. They allied with Queen Samastina and King Broyan, and routed the Lunar Army at the Battle of Pennel Ford. During the battle, Orlanth was freed from the Underworld and the constellation called Orlanth's Ring appeared with additional stars and quickly rose to the top of the sky.</p>";
echo "<p>After the battle, Harrek's companion Argrath, a Sartarite from New Pavis, traveled with a small group of followers to the border of Sartar and Prax and summoned the Praxian demigod Jaldon Goldentooth to recognize him as the White Bull.</p>";
echo "<p>That winter, Harrek and Broyan sacked the City of Wonders. That same winter, Humakti killed the Lunar client, King Temertain of Boldhome.</p>";
$y1624 = mt_rand (1,20);
if ($homeland == "Prax")
{
     $y1624 = $y1624 - 5;
}
if ($homeland == "Esrolia")
{
     $y1624 = $y1624 + 10;
}
if ($y1624 < 2)
{
     if ($homeland == "Prax" || $homeland == "Sartar")
     {
          jaldonsum();
     }
}
if ($y1624 > 1 && $y1624 < 10)
{
     echo "<p>A normal year.</p>";
}
if ($y1624 == 10)
{
     echo "<p>You almost ";
     $cause = death();
     echo ".</p>";
}
if ($y1624 > 10 && $y1624 < 13)
{
     boon();
}
if ($y1624 > 12 && $y1624 < 15)
{
     $civilstrife = mt_rand (1,20);
     if ($civilstrife < 6)
     {
          $hit = hitLoc();
          echo "<p>You were attacked and badly wounded by foreign solders or raiders. Pick a foreign culture (any homeland not your own or an immediate neighbor) and gain Hate (foreign culture), and a distinctive scar on your $hit.</p>";
     }
     if ($civilstrife > 5 && $civilstrife < 11)
     {
          $hit = hitLoc();
          echo "<p>You were attacked and badly wounded by members of a rival clan. Pick a neighboring clan. Your clans now have a feud over the incident. Gain Hate (rival clan) and a distinctive scar on your $hit.</p>";
     }
     if ($civilstrife > 10 && $civilstrife < 16)
     {
          $hit = hitLoc();
          echo "<p>You killed a member of a neighboring clan who now seek vengeance. Gain Hate (rival clan) and a distinctive scar on your $hit.</p>";
     }
     if ($civilstrife > 15)
     {
          $hit = hitLoc();
          echo "<p>You were nearly killed by members of an Elder Race. Gain Hate (Elder Race) and a distinctive scar on your.</p>";
     }
}
if ($y1624 > 14)
{
     $pennel = 1;
}

if ($pennel == 1)
{
     $pford = mt_rand (1,20);
     if ($homeland == "Lunar Tarsh")
     {
          $pford = $pford - 10;
     }
     if ($homeland == "Sartar")
     {
          $pford = $pford + 10;
     }
     if ($pford < 2)
     {
          $rep = mt_rand (1,6);
          $hit = hitLoc();
          echo "<p>You were nearly killed by Harrek the Berserk at the Battle of Pennel Ford. Gain a hideous scar on your $hit from the attack. Gain Fear (Harrek the Berserk), Battle +5%, and +$rep% Reputation.</p>";
     }
     if ($pford == 2)
     {
          $rep = mt_rand (1,3);
          $hit = hitLoc();
          echo "<p>You saw Harrek the Berserk at the Battle of Pennel Ford and survived. Gain a hideous scar on your $hit from the attack. Gain Fear (Harrek the Berserk), Battle +5%, and +$rep% Reputation.</p>";
     }
     if ($pford == 3)
     {
          $rep = mt_rand (1,6);
          echo "<p>You fought with great glory at the Battle of Pennel Ford. Gain Honor Passion or Devotion (deity), Battle +10%, and +$rep% Reputation.</p>";
     }
     if ($pford > 3 && $pford < 9)
     {
          $hit = hitLoc();
          echo "<p>You were nearly killed in battle at the Battle of Pennel Ford. Gain Battle +5%, and a distinctive scar on your $hit.</p>";
     }
     if ($pford > 8 && $pford < 15)
     {
          echo "<p>You fought at the Battle of Pennel Ford and survived. Gain Battle +5%.</p>";
     }
     if ($pford > 14 && $pford < 17)
     {
          $hit = hitLoc();
          echo "<p>You were nearly killed in battle at the Battle of Pennel Ford. Gain Battle +5%, and a distinctive scar on your $hit.</p>";
     }
     if ($pford == 17)
     {
          echo "<p>You were nearly killed or driven insane by Lunar magic at the Battle of Pennel Ford. Gain Hate (Lunar Empire) and Spirit Combat +5%.</p>";
     }
     if ($pford == 18)
     {
          $rep = mt_rand (1,6);
          echo "<p>You fought with great glory at the Battle of Pennel Ford. Gain Honor Passion or Devotion (deity), Battle +10%, and +$rep% Reputation.</p>";
     }
     if ($pford == 19)
     {
          echo "<p>You saw Harrek the Berserk in action at the Battle of Pennel Ford. Gain Fear (Harrek the Berserk) and Battle +5%.</p>";
     }
     if ($pford > 19)
     {
          $rep = mt_rand (1,6);
          echo "<p>You fought with great glory at the Battle of Pennel Ford. Gain Honor Passion or Devotion (deity), Battle +10%, and +$rep% Reputation.</p>";
          $coinflip = mt_rand (1,2);
          if ($coinflip == 1)
          {
               jaldonsum();
          } else
          {
               $sack = mt_rand (1,20);
               if ($sack < 6)
               {
                    echo "<p>You aided Harrek the Berserk in sacking the City of Wonders. You were betrayed and robbed by Wolf Pirates and left for dead. Gain Hate (Wolf Pirates).</p>";
               }
               if ($sack > 5 && $sack < 9)
               {
                    echo "<p>You aided Harrek the Berserk in sacking the City of Wonders. You were cursed by guardians of the city and nearly killed by spirits. Gain Spirit Combat +10%.</p>";
               }
               if ($sack > 8 && $sack < 15)
               {
                    $wonderloot = 100 * (mt_rand (1,6));
                    echo "<p>You aided Harrek the Berserk in sacking the City of Wonders. Gain $wonderloot L worth of plunder.</p>";
               }
               if ($sack > 14 && $sack < 19)
               {
                    $rolled = 2 + mt_rand (1,6) + mt_rand (1,6) + mt_rand (1,6);
                    $magic = heirloom($rolled);
                    echo "<p>You aided Harrek the Berserk in sacking the City of Wonders. You stole $magic.</p>";
               }
          }
     }
}

echo "<h3>Year 1625</h3>";
echo "<p>The current year.</p>";
echo "<p>With the White Bull Society behind him, Argrath liberated Pavis from the Lunar Empire and was proclaimed King of Pavis. Argrath led his Praxian allies to Dragon Pass but was defeated by Lunar sorcery and retreated to Pavis. At the same time, King Broyan was killed by Lunar sorcery.</p>";
echo "<p>The Lunar Empire gathered thousands of magicians, priests, and nobles to consecrate the new Temple of the Reaching Moon and extend the Lunar Glowline over all of Dragon Pass. A group of Sartarite heroquesters led by Kallyr Starbrow invaded the Lunar ceremony and summoned a True Dragon beneath the temple. The dragon devoured the temple and the attendees; in minutes, most of the military and magical might of the Lunar Empire in the Provinces was annihilated.</p>";
echo "<p>The True Dragon then rose into the sky, revealing its impossible size - it was several kilometers long. It flew up high into the Middle Air towards the Red Moon. Millions of observers across Genertela witnessed the event; those in Peloria, Ralios, Kralorela, and the far West saw a \"dragon-shaped cloud\" obscure the Red Moon. Those closer saw and heard far more. Across Dragon Pass, ancient draconic powers and thoughts quiescent since the Empire of Wyrms Friends were awakened. In the Lunar capital of Glamour, the Red Emperor sacrificed much of his magic and power to drive the dragon back. The True Dragon spiraled around Dragon Pass, circled Mount Kero Fin and then returned to the huge crevice it had made where once stood the New Lunar Temple.</p>";
echo "<p>Kallyr Starbrow marched on Boldhome and proclaimed herself Prince of Sartar. A Lunar Tarsh army led by General Fazzur Wideread indecisively fought the Free Sartar Army. The Lunar Tarsh army retreated after Fazzur learned that King Pharandros (the King of Tarsh and Fazzur's nephew) had murdered many of Fazzur's kin and supporters while the mighty general was away campaigning. General Fazzur returned to Dunstop and gathered allies. In Old Tarsh, the Shaker Priestess appointed a new King of Wintertop, rather than allow Fazzur's son Onjur to become king.</p>";
if ($liberation == 1)
{
     libPavis();
} else
{
     $y1625 = mt_rand (1,20);
     if ($homeland == "Prax")
     {
          $y1625 = $y1625 + 7;
     }
     if ($homeland == "Lunar Tarsh")
     {
          $y1625 = $y1625 - 10;
     }
     if ($y1625 < 2)
     {
          echo "<p>You were nearly killed in the Dragonrise. Gain Fear (Dragons) at 80%.</p>";
     }
     if ($y1625 == 2)
     {
          echo "<p>You fought against the Praxians in the Liberation of Pavis.</p>";
          libPavis();
     }
     if ($y1625 == 3)
     {
          $hit = hitLoc();
          echo "<p>You were nearly killed in battle between Lunars and rebels during the Liberation of Pavis. Gain Battle +5% and a distinctive scar on your $hit.</p>";
     }
     if ($y1625 > 3 && $y1625 < 11)
     {
          echo "<p>You witnessed the Dragonsrise and survived. Gain Fear (Dragons).</p>";
          if ($homeland == "Lunar Tarsh")
          {
               $betray = mt_rand (1,20);
               if ($betray == 1)
               {
                    $rep = mt_rand (1,3);
                    $hit = hitLoc();
                    echo "<p>You nearly died while fighting Sartarites with great glory. Gain Honor Passion, Battle +10%, a distinctive scar on your $hit, and +$rep% Reputation.</p>";
               }
               if ($betray > 1 && $betray < 6)
               {
                    $hit = hitLoc();
                    echo "<p>You were nearly killed in battle. Gain Battle +5% and a distinctive scar on your $hit.</p>";
               }
               if ($betray > 5 && $betray < 11)
               {
                    echo "<p>You survived the disorder after the betrayal of General Fazzur. Gain Battle +5%.</p>";
               }
               if ($betray > 10 && $betray < 15)
               {
                    $rep = mt_rand (1,3);
                    echo "<p>You betrayed General Fazzur for King Pharandros. Gain Loyalty (King Pharandros), Intrigue +5%, and +$rep% Reputation.</p>";
               }
               if ($betray == 20)
               {
                    $rep = mt_rand (1,6);
                    echo "<p>An assassination attempt was made against you on orders of King Pharandros. Gain Loyalty (General Fazzur), Hate (King Pharandros), Intrigue +5%, and +$rep% Reputation.</p>";
               }
          } elseif ($homeland == "Old Tarsh")
          {
               shaker();
          } elseif ($homeland == "Sartar")
          {
               libSartar();
          }
     }
     if ($y1625 > 10 && $y1625 < 17)
     {
          echo "<p>You witnessed the Dragonrise and survived.</p>";
          if ($homeland == "Old Tarsh")
          {
               shaker();
          }
          if ($homeland == "Sartar")
          {
              libSartar();
          }
     }
     if ($y1625 > 16)
     {
          libPavis();
     }
}

?>

</body>
</html>
