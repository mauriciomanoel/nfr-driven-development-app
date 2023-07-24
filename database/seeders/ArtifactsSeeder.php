<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Artifacts;
use App\Models\LifeSettings;
use App\Models\LifeSettingsSubcategories;

class ArtifactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artifacts_type')->insert([  
            'name' => "Storintelling",
            'mime_type' => "text/plain",
        ]);
        $storintellingId = DB::getPdo()->lastInsertId();

        DB::table('artifacts_type')->insert([  
            'name' => "Legal Regulations",
            'mime_type' => "application/pdf",
        ]);
        $legalRegulationsId = DB::getPdo()->lastInsertId();

        DB::table('artifacts_type')->insert([  
            'name' => "SIG",
            'mime_type' => "application/xml",
        ]);

        DB::table('artifacts_type')->insert([  
            'name' => "Taxonomy",
            'mime_type' => "application/pdf",
        ]);


        $user = User::where('email' , '=' , 'admin@nddframework.io' )->first();        
        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Home Safety and Care' )->first();

        $artifact = Artifacts::create([  
            'title' => "80 year old who lives alone in the periphery and has physical limitations",
            'description' => "",
            'content' => "Alfredo, 80, lives in the city's outskirts and is retired. In spite of his physical
            limitations, he lives alone because his home is prepared to provide daily life
            assistance to an elder person. A system installed in his house provides an
            environment with a range of interconnected sensors, devices and smartappliances
            working together to provide a safe and secure place to live.
            These appliances allow Alfredo an easy utilization due to their customized interfaces and are
            connected to Alfredo’s neighborhood care centre. This allows, when necessary, remote
            operation by authorized personnel. As part of the system infrastructure, the smart phones of
            Pedro and Joana, his children, also interact with his home.
            Several video cameras distributed along the house allow observing Alfredo’s daily routines
            (by authorized people) and, at the same time, maintain his privacy. The system, is capable of
            interpreting the situation from the captured images, and can react in order to provide
            assistance to Alfredo in case of need. This assistance ranges from the simplest activities,
            like making tea to more complex activities involving the interaction with the care center.
            During the afternoon Alfredo lit the stove to make tea, but forgot to put the pot with water on
            the flame. The system alerted him of that situation.
            While drinking his tea, Alfredo receives a video conference call. The video-conference
            facilities works in a way that provides “virtual” presence of other people, like Alfredo’s
            children and friends. Alfredo interacts with them through a giant and thin television held on
            the wall. When wearing the 3D glasses, he can even see and talk to his children, as if he
            could almost touch them, helping to reduce his feeling of loneliness.
            The installed system is also able to react to the most common domestic accidents that are
            recurrent to people living alone. If it sees Alfredo suffering a potential injury, like falling on the
            floor or cutting himself, the system inquires him to make sure he is well. This interaction is
            done via spoken natural language. If there is no reply, an alert is immediately sent to his
            children and the care centre.
            When Alfredo goes to the five o’ clock walk, a floor-cleaning robot starts its work. Meanwhile,
            Joana remotely sets the smart-cooking device to start preparing Alfredo’s dinner. At seven o’
            clock, while taking his dish out of the smart-cooking, the door bell rings. Immediately the
            camera starts collecting images from the person outside. An event is sent to the care centre
            and their children, proposing video stream interaction with the person. The devices
            positioned at the door and windows provide the required safety against intrusion by burglar.
            There is nothing to worry about, as it is Alfredo’s girlfriend. The door automatically swings
            open, as the house already knows she has permission to get in.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        DB::table('artifact_has_life_settings')->insert([
            'artifacts_id' => $artifactsId,
            'life_settings_id' => $lifeSettingsSubcategories->category->id,
        ]);
        DB::table('artifact_has_life_settings')->insert([
            'artifacts_id' => $artifactsId,
            'life_settings_id' => 2,            
        ]);


        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Personal Activity Management' )->first();

        $artifact = Artifacts::create([  
            'title' => "78 years old person living alone in his house in the town’s outskirts",
            'description' => "",
            'content' => "John is a 78 years old person living alone in his house in the town’s outskirts.
            Although he is a relatively healthy person he has a problem related to shortterm
            memory loss which is affecting his daily-life. Therefore, he needs some
            assistance to help him carry on his daily activities. Due to the demographic
            trends of last decades, there are not enough youngsters to assist the huge
            amount of elderly people.
            Fortunately, technology has evolved in the recent years. Personal computers and the so-called
            smart mobile devices have evolved and can now do fancy and interesting things. John’s pervasive
            computing infrastructure is everywhere in the house and his smart-device goes everywhere with
            him, operating as a Personal Social Assistant (PSA). John’s PSA is capable of sophisticated 
            reasoning, able to plan, run and coordinate complex activities and tasks. In addition, it is able of
            advanced human interaction, and can even resemble “human” emotions in order to enhance
            interaction.
            Due to his short-term memory problems, John relies more and more on his PSA to support carrying out
            his daily activities, and maintaining his autonomy. As they are together for a long time, the PSA knows
            every aspect of John’s daily life, including his habits and preferences. Some of the PSA’s responsibilities
            are agenda (reminding) management, utility bills management, dietary organization, and leisure
            organization. The PSA also comprises several sensors for obtaining some physiologic values, which helps
            perceiving John’s welfare. It also anticipates eventual health problems, like felling stressed or suffering
            from depression. The PSA takes care of John´s daily shopping. After checking the contents of John´s
            fridge and storage room, the PSA sends out an order to fill up John´s basic stock of supplies and, if John
            is in the mood for cooking, the ingredients of the recipes he has selected. The products will be delivered
            by a shopping service. Sometimes, John enjoys going to shop for food and other things himself, in order
            to meet and have a chat with local shop owners and other people on the market he knows. The PSA takes
            care for him here also and sends a special (radio) signal whenever John enters a store, so sales people
            know immediately that this customer needs special assistance. Another feature of the PSA is the
            management of John´s personal hygiene assistance. John is able to take care of very basic things, but
            when it comes to shaving or taking a bath, he needs help. John´s carer stops by his house in regular
            intervals. The PSA reminds John when it is time for a shave or a bath again, so he knows that the carer is
            about to come by. When John´s schedule changes, e.g. when his family comes for a surprise visit, the
            PSA notifies the carer that there is no need to visit John. The PSA is also able to intelligently search for
            information and news-media on the topics of John’s interest. “Listen John. I’ve just heard “Prokofiev’s
            violin concert number one” is being played in the theatre next month. Would you want me to make a
            reservation?” asked the PSA. “Yes, please”. The fact that John interacts with the PSA in such a natural
            way is beneficial to minimize John’s loneliness. “Don’t forget to take the blue pill from the second drawer
            John”. Sandra, John’s long date friend has just called. “Would you like to receive Sandra’s call, John?”
            “Yes, please”. At that moment it turned into a stand-alone state, letting Sandra talk through its interfaces.
            “Hi John. How are you?.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Localization/Positioning Assistance' )->first();

        $artifact = Artifacts::create([  
            'title' => "72 and very active. She has many friends and likes to go out regularly",
            'description' => "",
            'content' => "Angela is 72 and very active. She has many friends and likes to go out
            regularly. As she lives in the city centre, she finds it convenient to walk, as
            she always has. She is, however, suffering from angina and asthma which
            makes walking, although beneficial for both conditions, more of a challenge.
            This makes her planned trip to meet her friend Rosemary at the Science Museum more
            of a challenge than it was five years ago.
            But in those five years a single piece of technology has revolutionized Angela’s life: the “smart”
            mobile phone. She has used a mobile phone for some years but found the previous model difficult
            to use due to the small size of the keys. Recently she purchased a new-model phone with larger
            keys, larger display, and comprehensive functionality including adjustable color contrast, adjustable
            text size, zoom functions, digital maps, GPS, wireless and near-field communication (NFC), and
            different methods of output (text, pictograms and audio).
            It has been many years since Angela first visited the Science Museum (Galileo was still a scientist
            and astronomer rather than a satellite system at that time), so she does some pre-trip research
            about its location using the Internet. Then she pre-sets the location of the Science Museum into her
            smart phone. Once she leaves her house, she is able to consult her satellite-based positioning and
            route guidance system. She is informed audibly of the directions to take via an earpiece, which
            means she can leave the phone (and digital map) in her pocket. This is more reassuring to her as it
            enables her to focus on the route ahead rather than a device in her hand. Because the digital map
            is highly detailed and regularly updated to take account of things like road works or re-modeled
            pedestrian crossings, or even re-sited street furniture, she is able to rely on the audible output.
            Halfway through her journey she receives an audible warning that the presence of ozone is above
            the recommended level in that area. To avoid a possible asthma attack, she accesses a web-based
            journey planner on her smart phone to adjust her route to avoid the environmental problem.
            Soon Angela arrives at the museum. Upon entering, her smart phone switches seamlessly from
            satellite-based navigation to wireless-based, as the museum is equipped with a dense wireless
            network. As the phone is NFC-enabled, she is able to pay her concessionary entry fee by swiping
            the phone a few centimeters from a reader, with the fee automatically deducted from her credit
            account.
            She has arranged to meet her friend Rosemary in the café on the third floor. To find the café she
            consults the map of the museum on her phone display and plots out an appropriate route based on
            her personal profile. This route will include some stairs to provide beneficial physical exertion. The
            map is able to display multi-floor visual representations of the museum and alternative routes
            between amenities and exhibits when required; Angela is able to click on features of interest, and in
            this way soon locates the café. She is also able to access information about the café’s menu and
            services. Within a few minutes she has met up with her friend. Angela is happy that the powerful
            functionality of her smart phone combined with satellite and mobile technologies, and the wireless
            and sensor networks deployed in the city and on the building, have helped her enjoy a hassle-free
            and health-beneficial trip.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Mobility and Transportation' )->first();

        $artifact = Artifacts::create([  
            'title' => "A 70 year old man with a worsening eye condition and difficult to maintain his previous social life",
            'description' => "",
            'content' => "Pete is 70. Due to a worsening eye condition, he finally gave up driving two
            years ago, but since then he has found it difficult to maintain his previous
            social life. After several decades of relying on the car, he feels he has
            “forgotten” how to use public transport. Moreover, he has been put off by
            stories of complex fare structures, unreliability and anti-social behavior. He has lost his
            confidence in public transport. However, tonight Pete is due to attend a concert in the city
            center, and he decides to set himself a challenge: to attend by public transport.
            First of all, Pete carries out some pre-trip planning. Using the Internet he accesses details of the
            railway timetable; he needs to take the train in order to travel from his suburban town to the city
            centre (Central station). He knows that Central Station isn’t very close to his final destination, but
            from his research he discovers that the “Quaylink” bus departs from just outside the Central station
            and takes him to the quayside area and so within walking distance of the concert venue.
            On his journey, Pete realizes he will travel through the village where his friend Graham lives. Having not seen
            Graham for over a year he decides it would be a great idea to stop off briefly for a cup of tea. He calls Graham
            on his mobile and arranges to meet at the station café.
            After an engrossing conversation, Pete realizes he risks being late for the concert. His fear is worsened by an
            automatic alarm on his mobile phone that is triggered when he misses the next train. Because the system
            knows Pete’s current location and the time, it notifies him that there is not another train for half an hour, but the
            bus number X11 runs from the adjacent bus station in ten minutes. This service will arrive at the main railway
            station in time for him to connect to the “Quaylink” service. All this information is relayed to him in audio form
            because of his poor eyesight. On boarding the bus, Pete uses his smart card to pay the fare. Meanwhile the
            onboard information system informs him that his bus will arrive at bus stop R, whilst the “Quaylink” service will
            depart from bus stop T within five minutes of his arrival. He is advised that the walk between the two stops
            should take only two minutes. Pete discovers that his train ticket will also be valid on the “Quaylink” bus due to
            an arrangement between the operators.
            Suddenly aware that he has never visited the concert hall before, he remembers comments from friends about
            how large the venue is and how many stairs there are to negotiate. He decides to find out more about the
            physical access of the building by accessing a point of interest database on his mobile phone, finding
            reassurance that there are plenty of lifts – and assistance if required.
            Pete enjoys the show and feels that he will be much more comfortable using public transport in the future due to
            the assistance, convenience and reassurance that technology was able to provide for him. On the way back
            home however, Pete misses the last train. He is not carrying enough money for a taxi and starts to panic and
            hyperventilate. Using a speed call emergency number on his phone, he reaches a friend who calms him down.
            At the same time this number activates a localization service which determines which person from Pete’s
            network is closest to him, and notifies this person to pick him up and bring him home.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Mobility and Transportation' )->first();

        $artifact = Artifacts::create([  
            'title' => "75 year olds like to turn off the autopilot to enter their electric car.",
            'description' => "",
            'content' => "Mooming along a familiar winding road on his way home from his Thursday
            consulting session, Tom turned off the autopilot in his leased electric car –
            enjoying the feeling of control. He likes to take over from the autopilot to
            keep up his driving skills and anyway, his coach encourages him to practice
            as much as possible without automation. Tom interacts with the autopilot via voice
            commands, as it understands natural language. He would sit and say “Hi Auto, take me
            home, please.” Tom liked to treat it as Auto. “Sure.”, replied Auto. But as Tom this time
            was taking control, Auto just monitors his driving and advices about the directions to take,
            as a regular GPS navigator.
            Tom allows himself the luxury of the leased car since his 75th birthday while he is still commuting to
            his part-time work – he is actually enjoying helping a couple of young kids starting their own bakery.
            But now a chime suddenly interrupted Tom’s thoughts – the Auto’s automobile safety system
            detected an attention lapse by his eye movement pattern and by EEG measurements using remote
            laser sensors. The chime came just in time – he almost hit a pedestrian crossing the street in the
            front of his own house. This does not happen frequently in the outskirts of the city.
            The garage door, as well as the front door opened as soon as the security system in his house
            detected the RFID signal transmitted by his special watch. He appreciated the welcoming whiff of
            balmy air activated by the remote climate control anticipating his arrival, and the welcome of his
            companion robot, which helps him inside the house. At the same time, Auto started a self-cleaning
            process both inside and outside the car, using a built-in water-saver cleaning device. After which it
            parked itself in the garage and initiated its fuel-cells charge process.
            Suddenly, the ambient living system inside the house told Auto to ignite the engine and prepare to
            go, as Tom was not feeling well. Considering time-factor, the house decided that calling in an
            ambulance could be too late. The companion robot helped Tom going to the car, gently laying him
            inside. Auto knew already what to do exactly, taking Tom to the nearest hospital with signaled
            emergence march. Staff in the hospital was already notified about Tom’s arrival, waiting at the door
            with a reanimation kit if that was necessary. Fortunately, Tom fainted due to low blood-pressure,
            and there was no immediate danger to his health. Accompanied with his daughter Maria, who was
            also notified by the house, Tom agreed to sleep in Maria’s home. “This time, I want you to take me
            to Maria’s house, Auto”. “Already going sir. I’m glad you feel better now”. Replied Auto. “Yes, thank
            you Auto”.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Sensorial Supervision' )->first();

        $artifact = Artifacts::create([  
            'title' => "A 70 years old lady living in a fancy apartment in the city center",
            'description' => "",
            'content' => "Maria is a 70 years old lady living in a fancy apartment in the city center. She
            used to work as an art consultant in the city museum.
            Ten years ago, she underwent a knee prosthetic and is now retired. Even
            with motion limitations, it will not be this problem that will prevent her from
            living her life as she wants. In fact, she has a strong character and she does not admit a
            change in her habits.
            Her two children live in outside the city and do not have the possibility to visit their mother as they
            would wish. Their biggest fear is related to the possibility that Maria could fall in her apartment and
            not be able to ask for help. To worsen the situation, in the last year her other knee suffered an
            aggravation augmenting the risk and the consequences of a falling.
            Monitoring
            Sensorial Supervision
            Therefore, due to these problems, and trying to avoid the alternative option, hospitalization or going
            to an elderly residence, Maria accepted to have installed in her apartment a supervision system
            integrating a set of different types of sensors (presence, floor pressure, cameras, etc) that
            connected to a network of health caregivers and practitioners, health institutions and their children
            would be able to monitor her movements highlighting if any motion anomaly occurs.
            The system is not invasive and comprises a set of touch screens all over the apartment. All her
            daily activities are informed through a responsible caregiver who interacts with her through the
            screen located in the room where she is.
            In the morning, Maria was extremely excited because her two children and grandchildren were
            going to visit her. As so, she tidy up the apartment and then she went to the bathroom to take a
            bath before leaving to the supermarket. When she was leaving the bathtub she felt dizzy and fell.
            Immediately the pressure sensors in the bathroom floor were activated and the responsible
            caregiver appeared in the touch screen calling for her. Maria answered saying that she was ok, but
            she could not get up alone so the system automatically alerted the emergency services and the
            caregiver continued interacting with her just to be sure that she remained conscious.
            At the same time, her two children received an alert on their mobile phones informing about their
            mother’s situation and establishing a video communication to check if the emergency services were
            already at the place. They verified that she was already laid down on her bed and that the doctor
            was making a diagnosis. Fortunately nothing had been broken and her prosthetic knee was intact,
            and although she suffered several bruises, they were nothing to worry about. She only needed to
            rest for a while.
            Of course, that the dinner with her children and grandchildren was postponed for another day…",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Sensorial Supervision' )->first();

        $artifact = Artifacts::create([  
            'title' => "Patricia awoke just after dawn as usual, just before her smart home monitor system triggered her wake up alarm and turned on the lights in her bedroom.",
            'description' => "",
            'content' => "Patricia awoke just after dawn as usual; just before her smart home monitor
            system triggered her wake up alarm and turned on the lights in her bedroom.
            The small visual display beside the bed indicated that Patricia had had 7.5
            hours of sleep with a sleep quality index of 75%. \"Not too bad\" she thinks. Non-contact
            sensors located under the mattress, recorded motion, respiration, and ECG data
            throughout the night.
            As Patricia had grown older a good night’s sleep had become a luxury. Patricia, like more
            than half of all adults over 65, suffers from a sleep complaint. However, some recent
            orientations suggested by her doctor seem to be helping improve her sleep quality.
            Monitoring
            Sensorial Supervision
            In addition to the sleep issues, Patricia has diabetes type 2 and due to her weight she has
            not travelled far from her home for 3 years. Patricia is prone to bouts of depression due to
            her health and life setting. Her GP and care providers’ are aware of the situation and her
            dwelling has been fitted with mechanisms and sensors which are aware of her cognitive
            and emotional states. When triggered they inform her family/carer’s and some form of
            intervention is initiated.
            Patricia motivates herself to get out of bed when a bell chimes, a pleasant sound
            reminding Patricia to measure the level of glucose and cholesterol on her blood.
            Fortunately, they were within the normal levels.
            After breakfast, Patricia decided to go to the living room to read. While she was moving
            from the kitchen to the living room she suddenly starts feeling an extremely sharp pain in
            her heart and the cognitive sensors assess what could be happening and determine that
            Patricia is having a heart attack. The monitoring system automatically instructs her to
            make a heart massage while the emergency doctors are on their way…",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Chronic Diseases' )->first();

        $artifact = Artifacts::create([  
            'title' => "65 years old was diagnosed a colon cancer in a very painful situation that he had to face alone once he doesn’t have any more living relatives",
            'description' => "",
            'content' => "It is 8 o’clock in the morning and Howard starts listening to a voice calling him. He
            opens his eyes and verifies that it is Joshua, his latest humanoid robot acquisition
            that is trying to wake him up. It is time for his daily monitoring of the blood cells
            counts.
            Howard is 65 years old and 9 months ago was diagnosed a colon cancer. Since then his life
            turned upside down, and suddenly he saw himself in a very painful situation that he had to face
            alone once he doesn’t have any more living relatives.
            When he started the chemotherapy sessions, he was told about a new monitoring system that
            comprises a humanoid robot and that could help him at his house and with his treatments. At
            Monitoring
            Chronic Diseases
            the beginning, he didn’t like very much the idea of having a robot nursing him. But after some
            workshops he realized that with this he could have a good monitoring system of his health as
            well as a companion.
            According to his cancer type, he needs to get the treatment once a week. Meanwhile he needs
            a systematic blood cells counts monitoring in order to be sure that no serious complication arise
            due to low levels of blood cells.
            Howard is still sleepy while Joshua takes a blood sample from a vein in Howard’s arm using a
            test called a complete blood count (CBC). After that, Joshua places the sample in a special
            device that automatically examines the blood and sends the analysis results immediately to
            Howards’ doctor. Then, Howard gets up of the bed and goes for his daily shower.
            When he returns to the bedroom, Joshua has already established the video connection with
            Howard’s doctor that is checking the blood analysis results. Fortunately all the blood cells levels,
            white and red blood cells and the platelets, are normal according to his condition. After talking to
            Howard for a while, the doctor closes the communication channel.
            Howard is now in good shape to go for a walk, especially because the day is shinny and warm…",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Medication Assistance' )->first();

        $artifact = Artifacts::create([  
            'title' => "A 76 year’s old retired nanny",
            'description' => "",
            'content' => "Mariana is a 76 year’s old retired nanny. In spite of feeling well, she had to stop working 6 years ago due to an aggravation of her diabetes condition. Mariana lives with her husband Nicholas, who unfortunately suffers from osteoporosis, in a small house near downtown. Every day they wake up at 7am listening to my favorite radio, and when I don't have any urgent activities, they like to open the window to feel the sunlight.
            As they are quite isolated from the rest of the population, they had a monitoring system installed, integrating among other devices special mobile phones with medication assistance functionality. Using this system, they feel more accompanied and assured that the right medication is taken at the correct time. Mariana and Nicolas are assured that their personal information held on these special mobiles is kept secure and private as they are local regulatory agency rated and abide by a regulated standardization.            
            Medication Assistance during the morning they stay at home, but usually after lunch they go for a walk taking this opportunity to do some supermarket shopping. Before going out, Mariana goes to the kitchen to grab her special mobile phone (that keeps them tracked while walking) to check the shopping list and notices a flashing hint reminding to get a new batch of diabetes pills that the system requested from the local pharmacy.
            This reminder was automatically sent on the sensor installed in the pill dispenser to the mobile application, which must take action to request the local pharmacy for a new batch of medicines and check if the elderly person will pick up the medicines or if the pharmacy must deliver to the registered residence.            
            As the mobile app is connected to the local health system, when the pills are low, the doctor is asked for an electronic prescription to make the purchase request to the pharmacy, so depending on the activities planned for Mariana, she can go to the pharmacy to pick up your medications or the pharmacy will send it to your home. Mariana receives all notifications on her phone or on TV, she reflects on how useful this reminder is, especially as she informed her before she left the house.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Medication Assistance' )->first();

        $artifact = Artifacts::create([  
            'title' => "A 70 yeas old with type 2 Diabetes through oral pills, diet, and exercise.",
            'description' => "",
            'content' => "Jackie felt a soft nudge and looking up from her book saw CLARC’s blue eyes
            shining at her. CLARC (Care and Living Assistive Robotic Companion) tilled
            her head pointedly looking at the mobile medical unit on the tray it was
            carrying. Jackie smiled and sighed placing her finger on the unit’s sensor pad,
            while CLARC checked her blood glucose. CLARC’s eyes changed to green, which
            represents the all clear situation. Jackie picked up her book again, but was interrupted by
            a soft chime. CLARC’s eyes, blue again, were indicating towards the small pile of pills that
            had dropped onto a plate while a glass of cool water was being poured. Jackie didn’t know
            what she would do without CLARC to remind her to monitor her blood glucose and take
            her medicine. All those pills, it used to be so confusing to remember what to take, how
            much, and when. Jackie was lucky that she could now control her Type 2 Diabetes
            through oral pills, diet, and exercise.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Healthy Lifestyle Intervention' )->first();

        $artifact = Artifacts::create([  
            'title' => "Elderly with high cholesterol and high triglycerides",
            'description' => "",
            'content' => "Roberto suffers from high cholesterol and high triglycerides. Due to his health
            condition, he needs healthy lifestyle assistance otherwise can suffer
            consequences.
            Today his virtual caregiver, after the good morning regards, suggested an
            hour of exercise and for that Roberto has to wear a special t-shirt made of fabric sensors
            that allows the system to track his physiological data as well as follow his movements,
            recreating them on his bedroom big wall screen.
            The system begins the exercise program by projecting the routine onto the wall and
            played music through speakers. The sensors in the garment wirelessly transmit the data
            Caring and Intervention
            Healthy Lifestyle Interventions
            to the assistance system in which they are interpreted and mirrored on the projection of
            the exercises. To begin a game is played to warm up his joints and muscles. The game
            consists of trying to reach up to touch different shapes as they appear and once touched
            they disappear. Feeling nicely warm Roberto took his Pilates band and following the
            system’s instruction worked on his muscles toning exercises. After stretching out,
            Roberto went for a quick shower.
            After his bath, Roberto remembered that he needs to buy some food; nevertheless he
            can only consume products that do not contain lactose because of his allergy. He moves
            to the touch screen on the kitchen and asks the system to help him with the shopping list.
            After a while his printer starts printing the suggested list and then he leaves for the
            supermarket.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Healthy Lifestyle Intervention' )->first();

        $artifact = Artifacts::create([  
            'title' => "A 79 years old and although retired he likes to maintain some healthy activity,
            especially because he is overweight and he started to have some related
            health problems.",
            'description' => "",
            'content' => "Manfred, 79, and although retired he likes to maintain some healthy activity,
            especially because he is overweight and he started to have some related
            health problems.
            Manfred, supported by a smart cane, walked into the kitchen later than usual,
            a monitor positioned in the kitchen with an interactive interface reminds him of the session
            with his remote coach. But Manfred did not start his coaching session yet – he was a little
            embarrassed since he has not committed to regularly doing his daily exercise routine.
            Instead, using a voice command, he started his exercise game routine. Being overweight
            most of his life, he had not been much of a jock, but this game-based system was actually
            fun! It was physically and mentally challenging, without embarrassment, within the privacy
            Caring and Intervention
            Healthy Lifestyle Intervention
            of his bedroom. He was totally amazed because he was clearly improving – imagine at his
            age! Today, he pushed himself particularly hard because he wanted to surpass his
            previous record. He knows he can push himself hard because Manfred is well aware that
            the system monitors his vital signs and does not let him overdo it. This close monitoring is
            particularly important because of his congestive heart condition diagnosed a couple of
            years ago.
            Manfred had the opportunity to further his knowledge of using the internet by taking an
            evening class, which was taught by local secondary school students. There he learned
            how to take part in the social aspect of the web by using internet forums and websites to
            discuss and investigate about his condition. He has found a new social outlet online,
            meeting people in similar circumstances with similar conditions. They discuss how they
            are coping and swop stories of their conditions and how they can alleviate some
            symptoms and improve their health generally.
            The results of his exercise were instantly communicated to his coach, and when Manfred
            actually initiated the session there was already a message praising him for his
            accomplishments. The coaching system had already incorporated today’s weight
            measurements (automatically assessed by the load cells in the bed as well as a scale in
            the floor mat in the bathroom), blood pressure – measured by a sensor in his watchstrap,
            and the sodium ion concentration in his urine through the chemical analysis performed by
            the toilet. The coaching system, as well as his coach, was pleased with his outside
            activities, socialization and diet. Even his balance had improved so much that his smart
            cane is no longer required as much when he gets up at night to go to the bathroom, rather
            than providing him with mobility support.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Healthcare Management' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Marilyn is 75 years old, suffering from heart problems. As she lives alone and
            due to her health condition, she has acquired for her home a healthcare
            system that is connected to a healthcare center providing support and
            assistance in case of need.
            Today, Marilyn got up as usually and after a refreshing bath she went to the kitchen to
            prepare breakfast. Meanwhile, the door bell rang; it was her granddaughter Anna that
            was passing by and took the opportunity to visit her grandma. Marilyn was really happy
            to see Anna and invited her to join in for breakfast. After a while, Anna noticed that her
            grandma was desperately looking to a set o pills’ boxes and trying to remember which
            one she should take.
            Caring and Intervention
            Healthcare Management
            In the day before, Marilyn had gone to her heart medical doctor at the local health center
            to have a routine consultation. As her heart is getting weaker day by day the doctor
            passed a prescription with a new kind of pills.
            Thanks to the installed healthcare system, Anna got the opportunity to contact her
            grandma’s virtual nurse and ask for the right pill that Marilyn should take. This healthcare
            management system knows the person's status and needs and is on call at any time and
            in any place, to guide and support the person. This system acts as a knowledge source,
            a personal decision-support system, health and fitness coach, personal dietician, and
            much more, giving instantaneous feedback to the user, raising an alarm or informing
            professional or informal care givers when needed. This also includes the possibility for
            action related to behavior management by giving relevant education information and
            checking adherence to treatment programs (medication or exercise).
            Unfortunately, Marilyn’s virtual nurse was not sure about the right pills, so it forwarded
            the communication to Marilyn’s heart physician that promptly accessed her treatment file
            and answered accordingly. Marilyn smiled again and told Anna that she was getting
            really old and with memory issues.
            This system creates a communication channel with the Marilyn’s network of medical
            professionals who are involved in her current treatment plans and link her to diagnostic
            and treatment services. All care providers and their supporting facilities like radiology,
            laboratories and pharmacies use electronic health-record systems that are connected to
            a secure health-information-exchange network which enables easy access to the
            relevant data using a role- and task-based access-control system that is in line with the
            consent rules controlled by Marilyn. In this way, they all have constant access to up-todate
            Marilyn’s information, which is of course important in case of emergencies.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Remote Learning' )->first();

        $artifact = Artifacts::create([  
            'title' => "Elderly with 69 years old teacher for secondary (high school) students, who retired a few months ago and would like learning a new idiom.",
            'description' => "",
            'content' => "Teresa is a Math teacher for secondary (high school) students, who retired a
            few months ago. She knows, as intelligent she is, that stopping right know,
            excusing to rest during retirement, is in fact not very healthy, and that the
            next logical step is to replace work for something else, indeed. As she also
            likes and is planning to travel a lot, she came to the conclusion she had better learn
            English before her husband retires too. She proposed herself to learn as much as
            possible of English and English culture. Teresa went to the English School of her town
            and, after an initial assessment; she enrolled in the third level of an elderly class.
            Enjoying the fact the she is a student again she applied with vigor to learning the
            proposed subjects. Teresa came across that the school has also facilities for remote
            learning, letting students complement their lessons at home and doing the homework.
            She even noticed that there was a championship between the classes of the several
            schools. The prize would be one week traveling to London for the wining class.
            Teresa finds the site quite useful and a good complement for her lessons. The site is
            plenty of exercises, training sections for dictation and pronunciation, and games for
            increasing the knowledge of English. However, Teresa feels the whole concept of the
            site is a bit juvenile or even childish, and her colleagues aren’t using this resource for
            the same reason and because the interfaces are a bit complicate for them.
            Nevertheless, Teresa decided to use the remote resources as there are still useful to
            complement their learning. The remote facilities are tailored for younger students, as
            the majority of the School’s students are younger, she asserts. But she decided to
            propose the idea of starting to provide remote learning facilities more tailored for older
            students, as it was predicted a greater base of older students in the future...",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        $artifact = Artifacts::create([  
            'title' => "Elderly with 70 years old, a teacher for secondary students with would like learning English to travel.",
            'description' => "",
            'content' => "Mariana is a former math teacher for high school students, retired a few months ago. As she also likes and has plans to travel, she concluded that it is better to learn English before her husband retires too. She set out to learn as much as possible about English and English culture. Mariana went to her city's English School and, after an initial assessment; she enrolled in the third level of a class for seniors.
            Mariana found that the school also has Remote Learning facilities, allowing students to supplement their lessons at home and do their homework.
            Mariana finds the site very useful and a good addition to her classes. The site is full of exercises, training sessions for dictation, pronunciation, and games to increase your knowledge of English. However, Mariana feels that the whole concept of the site is a little juvenile or even childish, and her colleagues aren't using this feature for the same reason and because the interfaces are a little complicated for them.
            Mariana believes that her elderly colleagues would use the system and would even recommend other friends of the same age if the system were designed and adapted for the elderly, from the way of use, interaction, and content available.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Experiences Exchanging' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Hugh is a retired teacher of mathematics from the high school. Although he
            has 77 he feels extremely healthy an active.
            He really misses his students and the interactions with the newer
            generations. As he used to say: “there is nothing more refreshing than
            teaching mathematics to students and learning from them a set of other issues including
            new technologies, sports news, etc.”
            Hugh has a quite limited life due to his wife’s health condition. As she suffers from
            dementia he has to give daily support by taking care and paying special attention to what
            she is doing.
            During the day, the only time he has for himself is after lunch, when she is going for her
            daily nap. This is when Hugh goes to his home office where his newest “toy” is placed, a
            smart workstation at which he carries out his remote teaching activities. This work station
            comprises two sections: one with a PC and the other with an electronic black board
            where he writes down his lessons.
            With this smart workstation, he can simultaneously expose the subject on the electronic
            black board and follow the students’ expressions in the PC monitor when giving a remote
            mathematics class. These classes are part of a special programme introduced by the
            local high school to the students that are not correctly accompanying their classes.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();



        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Generic' )->first();

        $artifact = Artifacts::create([  
            'title' => "AAL Guidelines for Ethics, Data Privacy and Security",
            'description' => "",            
            'content' => $b64Doc = chunk_split(base64_encode(file_get_contents(storage_path() . '/files/AAL-Guidelines_Dec.-2022_FINAL.pdf'))),
            'artifacts_type_id' => $legalRegulationsId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Generic' )->first();

        $artifact = Artifacts::create([  
            'title' => "ISO/TS 82304-2:2021 - Health software",
            'description' => "",
            'content' => $b64Doc = chunk_split(base64_encode(file_get_contents(storage_path() . '/files/ISO_TS 82304-2_2021.pdf'))),
            'artifacts_type_id' => $legalRegulationsId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();



        

    }
}