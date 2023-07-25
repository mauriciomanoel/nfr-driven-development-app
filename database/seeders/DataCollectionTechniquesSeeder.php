<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DataCollectionTechniques;


class DataCollectionTechniquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DataCollectionTechniques::create([  
            'name' => "Entrevistas",
            'description' => "Como os usuários finais são idosos, realizar entrevistas individuais ou em grupo pode ser uma maneira eficaz de coletar informações detalhadas sobre suas necessidades, expectativas e experiências. As entrevistas permitem explorar as preocupações específicas de cada usuário, entender sua experiência com tecnologia e obter feedback direto sobre a usabilidade e a aceitabilidade do sistema AAL.",
            'insights' => "<p>Realize entrevistas individuais para permitir que cada idoso se sinta confortável e à vontade para compartilhar suas experiências e opiniões.</p>
            <p>Prepare um roteiro de perguntas abertas que aborde tópicos como familiaridade com tecnologia, necessidades de suporte diário, preocupações com privacidade e segurança, experiências anteriores com sistemas similares, expectativas em relação ao sistema AAL e feedback sobre a interface do usuário.</p>
            <p>Use uma abordagem empática e encoraje os idosos a compartilharem exemplos concretos de como o sistema pode melhorar sua vida diária.</p>
            <p>Considere a possibilidade de realizar entrevistas remotas para facilitar a participação dos idosos e garantir sua comodidade.</p>",
        ]); 
        
        DataCollectionTechniques::create([  
            'name' => "Questionários",
            'description' => "A realização de pesquisas pode ser útil para coletar dados quantitativos e obter uma visão mais abrangente das necessidades e preferências dos usuários finais. As pesquisas podem ser projetadas para incluir perguntas fechadas, como escalas de classificação e perguntas de escolha múltipla, para medir a importância de diferentes recursos e identificar preferências gerais. Além disso, podem incluir perguntas abertas para permitir que os usuários compartilhem suas opiniões e sugestões.",
            'insights' => "<p>Projete uma pesquisa online com perguntas de escolha múltipla, escalas de classificação e questões abertas.</p>
            <p>Inclua perguntas sobre a importância de diferentes recursos do sistema AAL, preferências de interface, níveis de conforto com a tecnologia, preferências de comunicação com cuidadores e familiares, e níveis de confiança em relação à privacidade dos dados.</p>            
            <p>Adapte o formato e a linguagem da pesquisa para garantir que seja acessível e compreensível para os idosos. Use fontes legíveis, evite termos técnicos complicados e forneça instruções claras.</p>            
            <p>Divulgue a pesquisa em locais frequentados por idosos, como centros comunitários, residências para a terceira idade e organizações voltadas para a terceira idade.</p>",
        ]); 

        DataCollectionTechniques::create([  
            'name' => "Observações",
            'description' => "Observar os usuários finais interagindo com o sistema AAL em seu ambiente natural pode fornecer insights valiosos sobre o uso real do sistema e identificar possíveis problemas de usabilidade. As observações podem revelar desafios específicos enfrentados pelos usuários durante o uso do sistema, bem como suas reações e comportamentos em relação às funcionalidades. Essa abordagem pode ser combinada com entrevistas para obter uma compreensão mais completa das experiências dos usuários.",
            'insights' => "<p>Realize observações no ambiente natural dos idosos, como em suas casas ou em ambientes onde eles interagem com o sistema AAL.</p>
            <p>Registre o uso do sistema, anotando os desafios encontrados, as reações emocionais, as interações com a interface e quaisquer insights relevantes.</p>            
            <p>Considere a possibilidade de fazer anotações visuais ou gravar vídeo para capturar as expressões faciais, gestos e interações dos idosos.</p>            
            <p>Seja respeitoso e discreto durante as observações, garantindo a privacidade dos idosos e obtendo seu consentimento informado.</p>",
        ]); 

        DataCollectionTechniques::create([  
            'name' => "Storytelling",
            'description' => "O storytelling pode ser uma técnica complementar para coletar informações qualitativas e obter insights mais profundos sobre as experiências, necessidades e expectativas dos usuários finais. Encorajar os usuários a compartilharem histórias e exemplos específicos de como o sistema AAL afeta sua vida cotidiana pode fornecer um entendimento mais rico e ajudar a identificar áreas de melhoria. Essa abordagem pode ser realizada por meio de entrevistas estruturadas ou em formatos mais informais, como grupos focais.",
            'insights' => "<p>Realize observações no ambiente natural dos idosos, como em suas casas ou em ambientes onde eles vão interagir com o sistema AAL.</p>
            <p>Registre o uso do sistema, anotando os desafios encontrados, as reações emocionais, as interações com a interface e quaisquer insights relevantes.</p>
            <p>Seja respeitoso e discreto durante as observações, garantindo a privacidade dos idosos e obtendo seu consentimento informado.</p>
            <p>Considere a possibilidade de fazer anotações visuais ou gravar vídeo para capturar as expressões faciais, gestos e interações dos idosos.</p>            
            <p>Estabelecer uma conexão empática: Crie um ambiente acolhedor e encorajador, onde os idosos se sintam à vontade para compartilhar suas histórias. Mostre interesse genuíno em suas experiências e demonstre empatia em relação às suas preocupações e desafios.</p>            
            <p>Utilizar uma abordagem centrada no idoso: Permita que os idosos liderem o processo de storytelling, dando-lhes espaço para compartilharem suas histórias de forma livre e espontânea. Evite interrupções e dê tempo suficiente para que expressem suas experiências de maneira completa.</p>
            <p>Fazer perguntas abertas: Incentive os idosos a fornecerem detalhes e exemplos específicos em suas histórias. Faça perguntas abertas que os estimulem a descrever situações e eventos que enfatizem as atividades de suas vidas cotidianas.</p>            
            <p>Criar um ambiente de confiança: Garanta aos idosos que suas histórias serão tratadas com confidencialidade e respeito. Transmita a importância de suas contribuições para o desenvolvimento do sistema AAL e assegure que suas opiniões são valorizadas.</p>            
            <p>Facilitar a expressão emocional: Reconheça que as histórias podem conter elementos emocionais e permita que os idosos expressem seus sentimentos durante o processo de storytelling. Isso pode ajudar a obter insights mais profundos sobre suas necessidades, expectativas e experiências emocionais.</p>        
            <p>Documentar e analisar as histórias: Grave ou registre as histórias compartilhadas pelos idosos, para garantir que as informações sejam capturadas de forma precisa. Após o processo de storytelling, analise as histórias coletadas para identificar padrões, temas recorrentes e necessidades específicas que possam direcionar o desenvolvimento e aprimoramento do sistema AAL.</p>",
        ]);

    }
}





