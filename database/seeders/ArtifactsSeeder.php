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


        $user = User::where('email' , '=' , 'admin@rs4aal.site' )->first();        
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

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Healthcare Management' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Rita is a senior nurse and has now started to work with a new system for teleconsultation.
            The system is suited for people with some disabilities or health
            problems that need continuous medical treatment. Whenever a situation
            arises and the patient is unsure about what to do, an expert can be consulted.
            Frank, 78, suffering from kidney failure is gardening at the Smith’s house, a young couple
            that moved in to the neighborhood two years ago. As they are extremely occupied Frank
            offered his gardening services to them being in this way also occupied during the day.
            Frank never leaves his house without his new smart mobile phone integrating a teleconsultation
            system that is connected to the local care center.
            Rita receives a call from Frank; he is extremely nervous and she asks him to calm down
            otherwise she couldn’t understand the emergency situation. Frank is showing his hand
            with blood all over and is begging for help. Rita calmly asks Frank to show her the wound
            through the smart phone camera and observes that it is quite ugly indeed, she also
            consults Frank’s medical registry and notices that Frank suffers from kidney failure, so she
            cannot administrate a common treatment. After explaining to Frank what he should do
            and what kind of medicine he can take, she waits for the results. Frank is now taking care
            of his wound and much more calm…
            Frank is really happy with this service. The use of a tele-consultation centre ensures that
            an expert is immediately available – which will mostly be impossible when calling the
            patient’s practitioner. Rita helped another patient and is now ready to assist another call.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Neuro-cognitive Compensation' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Jim is 87, and suffers from a relatively mild form of Alzheimer's disease. The
            effects of the dementia on his behavior are kept under control by drugs, and
            drugs also allow a fairly good functioning of amnesic functions.
            Nevertheless, quite often Jim is not able to correctly develop and fully carry
            out plans for his tasks, so his ability to successfully conclude many activities of his daily
            life would be seriously compromised without a good cognitive support system.
            But his smart home knows what he is doing, at any moment in the day:
              The home knows Jim's world, his habits, his preferences, the way he usually does
            things; it has been learning this through observation and recording for years, even
            since before Jim developed Alzheimer's.
              The home knows what Jim is doing right now: it knows where he is, if he's standing
            or sitting, if the TV - or any appliance - is on or off, if he's using it or not, what
            objects he is handling. By comparing observation and stored information, the home
            is able to recognize - with some likelihood - which activity Jim is performing, and
            subsequently the expected outcomes, the risk factors associated to that activity etc.
              The home is thus also able to actively support the correct execution of the activity,
            by seamlessly comparing the execution flow with a “normal” one (a “model” stored
            as a result of past observation), and by guiding Jim through a safe and effective
            sequence of steps, by means of ubiquitous audiovisual support.
            Jim is usually alone during the day, while a care giver stays at his home for the night: his
            children don't live in the same area of the town, and they are at work almost all day long.
            But they worry about Jim's wellbeing and safety and are always ready to intervene in
            case of need.
            They know that they can rely on Jim's AAL system, on its capability to keep the situation
            under control, and to inform them when something goes wrong.
            Jim likes to go out for a walk in the neighborhood, to the park, to the main square, or to
            the nearby grocery to buy some food. When he does this, the system automatically
            sends a message to Jim's relatives and/or to the care giver. This message is nothing
            alarming; it is a normal event, but it is good that they know that he's gone out. The same
            kind of message is sent when Jim comes back home.
            But two hours is probably a little too long. A new message, telling them that he hasn’t
            come back, could help. Just to let them know, so that they can try and contact him to see
            if everything's OK...",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Physical Compensation' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Thomas is a 70 years old person that despite his age feels healthy and eager
            to remain active as long as possible. Unfortunately, ten years ago, Thomas
            suffered a car accident that besides immediate severe injuries also left him
            with permanent ones, namely the need of having daily oxygen breathing and
            the need to use a wheelchair for the rest of his life.
            Along with other sensors and equipments Thomas wheelchair makes use of sonar technology to
            detect obstacles and modify his driving commands to ensure that the platform does not collide
            with any obstacle. Also the smart wheelchair is equipped with robotic manipulators, which can be
            used to manipulate common household objects.
            With the aim of improving his quality of life, Thomas installed at his home a system that manages
            the quality and quantity of oxygen that is needed. Also, in order not to be dependent from others
            for transportation, Thomas managed to buy a car adapted to his health condition
            When Thomas arrives at home, and as his car is equipped with an automated parking system, he
            manages to activate the system relieving him from many difficult maneuvers. When the car stops,
            it begins the procedures to un-dock the smart wheelchair and starts moving towards the house.
            Through the control panel of his smart wheel chair, Thomas can activate the oxygen system so
            that shortly after he can start to receive the necessary dosage of oxygen.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Rehabilitation' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Seven o’clock in the morning, as every day, Anna is going to have her breakfast. Anna is 79 years
            old, and since 6 years ago, when she underwent a hip prosthetic, she usually tidy up the house
            before performing the rehabilitation exercises. Although the rehabilitation started many time ago
            she still regularly goes to her physiotherapist office to preserve as much as possible her motion
            abilities. Anna suffers of a serious form of arthrosis that is going to damage with a notable pain all her
            articulation, especially the hip and the hands. Even if her left hand is almost closed, it will not be this problem to
            prevent her from living her life as she wants, in fact Anna as all the women of her family, has a strong character
            and not admit to change her habits so simply.
            Given this fact, the family managed to install a system in Anna's house that besides monitoring her movements
            is also capable of remote tele-operation. This characteristic is of extreme importance for Anna's rehabilitation
            exercises.
            Today, just after finished to prepare the room for the rehabilitation activity, she receives the call from her
            physiotherapist, and his image appears on the projection screen beside her bed. After the regards, the therapist
            starts indicating where Anna has to put the patch on her body. Such patches are sensors that will allow the
            system to track physiological data and to track the motion of the joints. Anna knows that, with the help of her
            system, she can perform the exercises autonomously, but she prefer to work with the therapist, especially
            because he is a so courteous man and she loves to chat with him. It is not the first time that she needs to
            change the time scheduled for the rehabilitation exercises. Sometimes the therapist isn’t at disposal for the time
            Anna requires; just in that case Anna uses the automatic training.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Adjusted Working Space' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Mario is 70 years old and is a skilled worker who works in wood and inlays
            objects. He is skilled at restoring old small wooden objects. He is restoring a
            wooden jewel box for a museum. He follows directions given to him by the
            director of the museum to complete his task.
            Mario has a smart workstation at which he carries out his activities. This workstation is
            made up of a desk with two sections: one with a PC (monitor, case, mouse, keyboard and
            webcam) and the other with tools to work in wood. Mario’s workstation is able to recognize
            if he is working with the computer or in the other section:
              If Mario is at the PC, the lighting of the workstation is changed automatically to
            facilitate Mario’s working; he is presbyopic. There is also a set of sensors that
            recognize the distance between Mario’s and the desk (during the day Mario often
            changes the height of his chair) and the height of the monitor is automatically varied
            in order to give Mario the best visibility;
              If Mario is working with instruments to inlay the wood, the smart environment
            recognizes which tool he is using and varies the light accordingly; the change of air is
            also automatically increased because he works with chemical agents and produces
            wood shavings and dust.
            With this smart workstation, he can simultaneously work on the old wooden jewel box and
            follow the directions given to him by the director of the museum. Mario is also able to use
            his computer with special software and interfaces that facilitate access and control of the
            PC.
            Thanks to this special workstation and easy use of the computer, Mario is able to remain
            in touch with many international experts who contact him seeking his advice. He is also
            able to teach remotely some lessons about restoring wooden objects to students at an art
            school.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Adjusted Working Space' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Helen is 63 years old and is a psychologist. She is a professional and works in
            her office. She actually works in the Human Resources department of a
            company and has been working there for twenty years. The managers of the
            firm asked her to create a database of employees’ skills, aptitudes and
            ambitions. She has therefore organized a meeting with workers and she enters the
            information she obtains onto the database.
            She would have used a PC for this kind of work in the past but since a health decline in
            the last 18 months she now uses a special computer workstation for this task that has
            been adapted to her changing needs.
            The smart PC is able to recognize who is using it thanks to its biometrical system: access
            to the database on the employees is allowed only to Helen and some managers.
            When the workstation identifies Helen (who’s employers have trained her to use the new
            biometric system), it adopts working conditions suited for Helen. She is unable to use a
            normal keyboard and suffers from arthritis in her finger joints; she also has carpal-tunnel
            syndrome. She therefore uses two different interfaces to use the PC: a tablet keyboard
            and a voice keyboard. When Helen uses the first system, she writes her notes using a
            special pen directly on the tablet keyboard: the tool recognizes Helen’s calligraphy and
            compiles the words in text files. If Helen feels tired in her hands and she prefers not to
            grip the special pen, she uses the second system, a voice keyboard. This recognizes her
            voice and reports the words she pronounces onto text files in the database. The voice
            keyboard is smart because it recognizes and transcribes only the words spoken by
            Helen, not by other employees in the Human Resources office; it is also able to
            distinguish vocal commands from sentences dictated.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Adjusted Working Space' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Michael, 60, has worked for the post office for 15 years. He started out by
            shifting stock and moving goods around the storeroom. This was very
            physical work. At the age of 50 he started to experience back problems
            which made it difficult for him to carry out his jobs. His employers at the post
            office offered to retrain him to handle the stock ordering and stock-taking instead. He
            took part in an internal training scheme where he learnt to use the post office databases
            and ordering systems. He now handles the administrative side of the stock handling. His
            experience in the storeroom helped him to bring new insights to the ordering process and
            his employers are very pleased that his experience has helped them to devise a new
            stock ordering process which has saved them some money.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Inter-generational Relations' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Anthony, 69 years, is at a pre-retirement phase, still working in a consultancy
            company. He is very knowledgeable, and the company tries to keep him
            inside as long as possible. Anthony enjoys working in this company
            characterized by skilled staff of diverse generations, ranging from the “baby
            boomers” to the youngster ones. They work well together, but that was not always the
            case…
            Although there is a gain in strength, innovation knowledge and experience from having
            generational diversity, there is also the potential for disaster, keeping them together
            carelessly.
            Intergenerational relationship problems arise not only from distinct working styles, but also
            from the preferences and values characterizing each generation. For instance, while
            Anthony and is colleagues of the same age liked to put a bit more effort of their own to get
            things done, others like to be more collaborative and adaptable. The youngster
            generation, on the other hand, is seen as extremely “tech-addicted”, preferring text-based
            and video-conference interaction, which is significantly distinct from the previous
            generations.
            Fortunately, the company soon realized the problem, and understanding the concerns
            associated to divergent working styles from distinct generations, raising the necessity of
            an organizational change. As a result, working principles and policies for handling
            generational conflicts were clearly formulated and adopted; newer communication tools
            were adopted, aiming at easing the compatibility between working styles, and increase the
            ability to communicate and work together.
            The company is now proposing Anthony and other colleagues who are also retiring, not to
            quit their jobs and remain working, even if it was at a reduced level and undertaking affairs
            from their homes, allowing the company to continue profiting from their skills and
            knowledge. Having said yes, considering the concerns from intergenerational conflicts
            handled before, it is likely that this newer situation of retired working from home, together
            with regular staff, might cause newer, unhandled, organizational concerns…",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Keeping Links with Former Employers' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Like in the past, Jack is heading to the headquarters of WiseCompany where
            he used to work as a senior project manager. But today he travels in a
            relaxed mood. His destination is not his old office where he would get
            immersed on the daily routine problems, all waiting for urgent solution.
            Now that he is retired, his destination is the SeniorClub, so he is not under stress and
            can spend time observing the frenetic movement around and enjoying his trip.
            Concerned with the prospects of the first wave of brain drain as baby boomers
            generation retires – i.e. face the sudden departure of thousands of skilled workers,
            WiseCompany launched the SeniorClub as a mechanism to keep the links with their best
            knowledge workers after retirement.
            The club offers conditions for socializations of former employees and among them and
            active (young) employees. Furthermore, retired experts are encouraged to continue
            contributing to some high-level activities of the company, e.g. coaching or advising in
            critical projects, participation in strategy and roadmap definition brainstorming sessions,
            or acting as consultants in specific tasks.
            The Senior Club offers a nice lounge / meeting facility, with free access to ICT
            equipment, refreshments, entertainment facilities, etc. Furthermore, members can get
            some other fringe benefits and some payments as a result of their contribution to the
            economic activities of the company.
            Jack joined the SeniorClub initiative and today he is going to discuss with his fellows and
            some young engineers some strategy for the introduction of a radical new product in the
            market.
            It is very rewarding for him to feel that his accumulated experience and mature
            knowledge is appreciated by his former employer and that he has the opportunity to
            continue active. Keeping the social links with his former colleagues while given the
            opportunity to stay in touch with new developments and trends is also very important for
            Jack. Furthermore, his contribution to the company is rewarded with some payment and
            fringe benefits that help him keep is standard of life.
            Jack feels lucky for having this opportunity but a sad though came to his mind. He just
            remembered his relative Fred, that used to work for a SME and has no such opportunity
            to keep and active life. Last time they met at a family gathering, Fred looked a bit
            depressed...",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Freelancing and Entrepreneurship' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Manuel just finished his breakfast and while enjoying this lovely morning of
            early Spring, he is now logging in the ProSolve portal. ProSolve is an
            electronic market place for innovation and problem solving allowing a
            community of retired highly skilled professionals to address problems and
            innovation challenges posted by client companies. A number of mechanisms are
            implemented in this marketplace, including:
            - Open innovation challenges. A company looking for new ideas and potential solutions
            places a “challenge” in the market and indicates the associated monetary value. Members
            of the pool of experts of ProSolve can offer ideas / solutions (bid) on a confidential basis.
            The author of the idea / solution picked by the client company will be the one to be paid.
            - Target problem solver. A company wants to find an expert with the right profile to perform
            a specific problem solving task. ProSolve helps matching potential experts with the
            requested expertise and facilitates the negotiation and contractual arrangements as well
            as other due diligences.
            - Assistance / coaching. A company needs consultancy / coaching on some best practice.
            Potential experts are identified by ProSolve (matching mechanisms) and when agreement
            is reached the task is contracted.
            ProSolve plays an important role in all issues related to confidentiality, intellectual
            property, contractual aspects, and quality monitoring. After browsing over the new
            opportunities, Manuel found an interesting challenge and started digesting a solution
            based on his accumulated experience but also considering the pleasure of competing to
            offer a wining idea. Two weeks later, Manuel received the great news that his idea was
            selected. Wow! He had been participating in other challenges before without being
            selected ... nevertheless he continued just for the pleasure of exercising his knowledge
            and experience. But now, the 10 000 euros reward for his solution are certainly much
            welcomed and right on time to plan his summer holidays!
            While enjoying the news of the day, another idea came to his mind: It would be much
            more interesting if ProSolve evolved from a marketplace to a real community offering
            social networking aspects and also mechanisms for easily teaming up with our experts to
            work together on a problem instead of being alone.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Freelancing and Entrepreneurship' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Pedro is 67 years old, a university professor who has reached retirement age
            and has thus had to give up teaching in the faculty of Economics where he
            has taught for more than forty years. When he retired, two years ago, he
            considered himself happy since he was able to dedicate time to writing, one
            of his passions, to sports and dedicate more time to his wife, their children having long left
            the family home.
            A few months ago his wife died, which has meant a drastic change in both his personal and
            economic situation. As regards his personal situation, his spare time has increased considerably
            while at the same time his interpersonal relationships have reduced in number and quality.
            Economically he is facing a considerable increase in his monthly expenditure, now that he has to
            afford to pay someone to fulfill the care needs that used to be fulfilled by his wife. This, added to the
            steady loss of buying power of his pension may, in the medium term, result in economic problems.
            Talking the subject over with his friends, one of them told him about the existence of a consultancy
            firm in his city that regularly reaches agreements with independent professionals, who are experts
            in certain fields, to cover work contracts usually related to international institutions. On talking to the
            consultancy firm, he finds that it is indeed true that certain agreements of this nature are possible,
            always assuming that the retired person is legally able to carry out the service and bill for it
            accordingly. Whilst chatting to his financial advisor he learns that the government has made a
            recent change in the law that allows retirees to sign up on a part time basis for the execution of
            professional services.
            Working it all out on paper, with the time that the consultancy is willing to guarantee him, Pedro
            thinks he would be interested, since it would give him a guaranteed increase in his level of income,
            would cover his new expenditures and at the same time would be compatible with the time he has
            free and would additionally afford him a chance to increase his social and interpersonal relations.
            As an aside, he tells the consultancy that his health seriously limits his ability to travel, for which
            reason his services should be limited to his immediate environment or be given through new
            information technology. The consultancy makes it clear that in this regard he will have no problems,
            since they dispose of the necessary methodologies and technical equipment and communications
            to allow him to work, even through video conferencing.
            On reaching an agreement, Pedro starts his working activities and a few months later finds himself
            very satisfied. His expectations have been met and apart from a few problems related to the use of
            some technology (which were resolved by the training provided by the consultancy) he has adapted
            perfectly to the new situation. His next objective is to diversify his sources of work so he is thinking
            of the possibility of affiliating to a body of retired professionals that offers similar opportunities, or in
            the case that no such body exists in his city, attempt to found one himself. To this end he is using
            his recently gained knowledge of the Internet to look into the existence of this type of association.
            He also plans to offer independent consultancy advice for employers working with other older
            employees so that they can develop new business models to take advantage of the senior
            members 26 of their workforce.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Working in Professional Communities' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "George is a senior electrical engineer that used to work for the national energy
            distributor as a public installations analyst and inspector. Although 65 years
            old he is a healthy man and felt frustrated for being obliged to retire so soon
            and at the same time depressed because he was at home with nothing
            interesting to do; he was feeling that he needed to give his brain some activity.
            One day, when navigating on the Internet, George found a website that attracted his
            attention – the ActiveSeniors Community. This website supported a community of senior
            people that was created out of the necessity of people to remain active after retirement
            through sharing with others their experiences, skills and knowledge. The main objective of
            ActiveSeniors is providing professional assistance to people, companies or organizations
            located in developing countries through unpaid/volunteering senior expertise.
            George felt enthusiastic with the ActiveSeniors Community, especially with the idea of
            travelling to a new country and of putting his brain in motion again, and registered
            immediately as a new member. After the registration process George received a welcome
            letter and a collection of information containing the community rules.
            A couple of months later, George was still waiting to be contacted for an assignment and
            he started to feel anxious with the situation and remembered to start looking for missions.
            After a couple of days searching he found a small electrical company in Cabinda, Angola,
            that was passing severe financial problems. George contacted both ActiveSeniors and the
            small Angolan company and after all the arrangements were properly made George went
            to Cabinda.
            When George returned from Angola he was so happy that his relatives realized the
            importance of keeping retired people active…
            In fact, contributing to help a region in need and also having the opportunity to travel was
            a great reward, especially considering that George’s pension is enough for his needs. But
            the lack of opportunities to contribute is something that still worries him … By the way,
            thinking about the difficulties, he also felt a bit uncomfortable for having to perform his
            mission alone and having to do some field work in Cabinda to better understand the
            problem before he actually could contribute to solve it…. As a result his contribution was a
            bit limited as the resources for the mission ended ...",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Working in Professional Communities' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "José is apprehensive today. In fact he has been worried lately. Everything
            was different two years ago when he and his friend had this idea for an
            innovative low consumption air conditioning device and started their FreshAir
            company. The two engineers soon developed the new equipment thanks to
            their dedication and enthusiasm. But now they are facing difficulties. They don’t know
            much about marketing or internationalization, although they understand the need to
            target a global market. Unfortunately they spent all their resources in the start-up phase
            and now cannot afford to get assistance from one of those big consultancy companies …
            Either something happens or may have to close and fire their employees soon…
            Three weeks later...
            José and his colleague are having a meeting with Carlos and Ana, two members of the local branch of
            the Regional Development Agency (RDA). After some initial contacts, Carlos and Ana spent some time
            in the company making an analysis of its problems and today they are presenting their conclusions.
            The diagnosis seems logical to José. It is clear that FreshAir needs some coaching and specialized
            guidance in two crucial areas – focused marketing and internationalization.
            But they cannot afford the high costs of such specialized assistance. RDA, an organization funded by
            the local government and that aims to promote local businesses, made the analysis for free.
            Unfortunately they do not have the expertise to help in the next phase …
            Guessing the worries passing through José’s mind, Ana told them that there is a potential solution.
            Then she mentioned the ActiveSeniors association…
            Pedro is a retired professional, member of ActiveSeniors. Based on his specific expertise and
            experience in marketing, he was invited to join a team involving 2 other members of ActiveSeniors with
            competencies in internationalization and air conditioning. Together with Carlos and Ana from RdA, this
            team started a temporary collaborative network with people from FreshAir. After 3 months the first
            results are starting to show up. The ActiveSeniors team not only provided technical assistance and
            guidance, but also helped FreshAir establish some contacts with a new market in India. Now the
            business prospects for the young company seem brighter…
            Pedro is quite satisfied for having this opportunity to work on a topic where his experience was a real
            added value. He very much appreciated the diagnosis and preparatory work done by RDA, which
            allowed him and his senior colleagues to focus on the core issues. Working in a team was a great
            experience. The small payment Pedro received is also great to complement his pension and give him
            some better living conditions. FreshAir and RDA could mobilize some resources to pay a small fee to
            the 3 members of ActiveSeniors, a value much lower than the typical consultancy prices that could
            never be afforded by FreshAir.
            Carlos and Ana got a special recognition from their boss at RDA for being successful in helping a local
            company and thus creating better economic prospects for the region.
            José and his friend re-gained their enthusiasm and they really appreciated the value of this
            collaboration endeavor with RDA and ActiveSeniors. They certainly plan to keep contact and look
            forward to again use the amazing pool of expertise & experience available at ActiveSeniors.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Virtual Communities' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Having a lifelong taste for playing the guitar, Arthur of 75, has finally found a
            way to keep up to date and accompanied in the area. He found an online
            community (composed of members from all ages) with the same taste as his
            own for the guitar playing. Therefore, Arthur managed to become an online
            member of such community. This community uses video and social networking to play
            together online.
            Whenever Arthur desires to play accompanied with his community mates, he accesses
            the community platform and can immediately see the names and images of his regular
            session mates, who are also online, pop up on the screen one by one. Once they have
            all agreed upon the music they begin to play it. It is also possible for other community
            members, who enter online afterwards, to also join the group and play on.
            Besides playing, the online community platform also offers its members functionalities for
            sharing music and chat. For each item of information, users can express judgments,
            remarks and opinions by means of both a facilitated keyboard or voice-recognition
            software, and such judgments are sent directly to the main senior coaches that manage
            the information or event.
            Today, Arthur feels like going out. Therefore, he logs in the online community and invites
            members to join him at the local club tonight. After some time, he receives answers from
            some members saying that they would join him and that evening is going to be great
            because they will finally meet in person.
            After having dinner, Arthur through his PDA verifies what the next bus that will take him
            downtown is and leaves home.
            It is late night, and Arthur misses the bus back home… hopefully with the help of his PDA
            he accesses a community transport support group that after identifying through GPS the
            nearest member available, collects him and brings him home.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Social Events Management' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Bill Graves, 70 years, is a healthy and happy, retired, person taking the best he
            can from his free time. He knows that life is short and that we need to live it
            well together. He is very social, engaging in civic activities of his town. He
            also likes to travel, run, walk, attend shows, go to the theatre, seeing movies,
            and most of all, giving flowers to his wife. Being so active, it is somehow difficult to handle
            such level of activity without assistance, given that his age his memory is not what it used
            to be.
            In fact, he relies on a program running in his tablet, which helps him manage the events
            he attends. This program is part of a platform connected to his town and integrating
            information from several sources and services, most of it social events, including leisure,
            sports and shows.
            The platform allows members to form small groups to jointly attend an event. Being
            configured and personalized to Bill’s preferences, the program tells him about what he can
            do interestingly each day, including a reminding to buy more flowers.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Gaming' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Some elderly people are looking for new ways to keep active and alert. They
            are responding to the advice to take care of their brain and are involved in
            special activities such as doing jigsaw puzzles, juggling, dancing and playing
            table tennis. Nowadays, games that have been specially designed to
            stimulate and train the brain are also available. Such games are now entertaining a new
            generation of computer users: elderly people who up to this time have not been
            interested in computer games.
            One example is Elvira that has always been a fan of the bingo nights. As now she cannot
            anymore go to those events due to her mobility problems, she plays with her friends
            remotely using the bingo online forum. Nevertheless, she feels that is not the same as
            being out and in the company of her friends.
            Fortunately the bingo institution has developed a system that allows remote playing with
            the feeling of being in the environment of the bingo night. The system basically integrates
            cameras, movement and emotion sensors and also holographic projections.
            Although Elvira was not a fan of new gamming technologies and preferred real games, is
            now a complete fan of this system as it allows her to play as she was really in the bingo
            night room session.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Gaming' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Amanda is a 70 years old woman who used to attend the recreational centre
            of her residential area. Among several activities, one of her favorites was to
            play cards with her community friends.
            In the last months, Amanda’s state of health began to deteriorate and she
            was forced to stay at home resting in her bed. Nevertheless, and thanks to devices made
            available by the recreational center, her passion for playing cards with her friends who
            are in the in the community recreational center can continue to be fulfilled. To play they
            use a special platform made of touch screens and monitors embedding webcams that
            are remotely and wirelessly connected between them. In the recreational centre, each
            friend has their own touch screen showing their own cards and on the table stands a
            monitor that shows the cards at stake. At home, Amanda has a touch screen showing
            her cards and a monitor that displays both the cards at stake and her friends. Thanks to
            the real-time communication between the different components, the four friends can talk
            and discuss, see gestures of their companions and interact positively.
            Although Elvira was not a fan of new gamming technologies and preferred real games, is
            now a complete fan of this system as it allows her to play as she was really in the bingo
            night room session.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();

        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Cultural Activities' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Bruce loves to go to the theatre and to the cinema. Unfortunately, five years
            ago he was diagnosed a motor disability that prevent him to go to such
            activities with the regularity that he desires. Hence, Bruce seeks to find a
            way to allow him to overcome the lack of going out so often to attend
            cultural activities.
            Fortunately, now there is a system suited for people who have motor deficiencies and
            cannot move so easily from their houses but can remotely access services or events by
            using digital television or a facilitated computer connected to biometrical recognition
            systems (fingerprints, voice, optical). With this system Bruce can be identified and gain
            remote access to specific services like a post office or a register office and talk with
            workers. Bruce can also buy tickets for particular events and watch them on the
            television or computer screen.
            Bruce usually, uses this virtual service to access most of the cultural activities.
            Nevertheless today Bruce is going out to the local art gallery because the exhibits are
            of great interest and he wishes to contemplate them in loco. For that, he accesses a
            supported and accessible special transport service that will bring him to the gallery.
            When he arrives, a route plan guides Bruce through the gallery room to find the exact
            exhibits that he was looking for. This route is optimized by avoiding barriers that match
            his motor disability.
            Bruce stays for hours admiring the exhibits while an online gallery curator provides
            additional detailed information of the art pieces on his PDA.",
            'artifacts_type_id' => $storintellingId,
            'life_settings_subcategories_id' => $lifeSettingsSubcategories->id,
            'users_id' => $user->id,
        ]);
        $artifactsId = DB::getPdo()->lastInsertId();


        ##############################

        $lifeSettingsSubcategories = LifeSettingsSubcategories::where('name' , '=' , 'Recreation Activities' )->first();

        $artifact = Artifacts::create([  
            'title' => "Storintelling",
            'description' => "",
            'content' => "Joanna is a 60 years old lady that used to work as public relations in one of
            the biggest art gallery of in the city center.
            She was forced to stop working due to a car accident followed by fire in
            which she was extremely injured especially in her face with a second degree
            burn. Since then, and taking into consideration her age, and her specific profession
            (where the image is fundamental), she does not feel yet the courage to go out and face
            all the people’s observations about her face.
            Joanna’s husband, John, is a very busy man running a financial consultancy company. In
            spite of travelling a lot, when he is at home he dedicates all his spare time to Joanna.
            Nevertheless, it is not sufficient for her, and most of the times she feels alone and
            isolated from the world.
            One of the things that make her feel isolated and depressed is the lack of human contact
            as well as her daily exercises at the gym. In order to overcome this, they installed an
            entertainment system integrating a services network where several entertainment
            packages are available.
            Therefore, all mornings Joanna checks out on her wall digital and touch screen, which
            Pilates classes are about to start. Once chosen the class to attend, Joanna selects her
            personal avatar (Joannatar) that will represent her in the virtual class room. On a side
            window she notices that her Pilate’s friends, Annatar and Paulatar, are also attending the
            class and she feels really happy, because she will have someone known to share some
            thoughts while practicing the exercises.
            It is almost time to start, and Joanna is dressing her special training garment composed
            of several sensors that are connected to the system. In this way, while she is doing the
            exercises at home, Joannatar is receiving information about what she is doing and
            reproduces the same movements in the virtual class room. She “sees” herself in the
            class with all the other attendants and at the same time has an audio communication
            channel that permits everybody to listen to the coach and to speak with her colleagues
            as if she was in a real class room attending a Pilate’s class.
            This system brought her a different life, because in one hand she does not have to show
            her face and on the other hand she can both exercise and socialize.",
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
            'content' => $b64Doc = chunk_split(base64_encode(file_get_contents(storage_path() . '/files/AAL-guidelines-for-ethics-final-V2.pdf'))),
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