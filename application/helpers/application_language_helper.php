<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function getVariable($var, $key)
{
     $ci = &get_instance();
     $ci->load->library('session');

     $language = $ci->session->userdata("CURRENT_LANGUAGE");

     if (empty($language)) {
          $ci->session->set_userdata("CURRENT_LANGUAGE", "th");
          $language = $ci->session->userdata("CURRENT_LANGUAGE");
     }


     if ($language == "en") {
          $result = $var->{$key . '_en'};
     } else {
          $result = $var->{$key . '_th'};
     }
     return $result;
}


function getWording($page, $key)
{
     $ci = &get_instance();
     $ci->load->library('session');

     $configurations = array(
          'index_menu' => array(
               'th' => array(
                    'lng' => 'th',
                    'homepage' => 'หน้าแรก',
                    'about' => 'เกี่ยวกับเรา',
                    'companyprofile' => 'ข้อมูลบริษัท',
                    'history' => 'ประวัติความเป็นมา',
                    'message' => 'สาส์นจากซีอีโอ',
                    'management' => 'กรรมการบริหาร',
                    'knowledge/news' => 'บทความ/ข่าวสาร',
                    'knowledge' => 'บทความ',
                    'news' => 'ข่าวสาร',
                    'seminar' => 'สัมมนา',
                    'solution' => 'โซลูชั่น',
                    'contact_us' => 'ติดต่อ',
                    'enterprise_application' => 'เอ็นเตอร์ไพรส์แอพพลิเคชั่น',
                    'datacenter' => 'ดาต้าเซ็นเตอร์และคลาวด์',
                    'marketing' => 'ดิจิตอลมาร์เก็ตติ้ง',
                    'streaming' => 'สตรีมมิ่งโซลูชั่น',
                    'it_support' => 'ไอทีซัพพอร์ต',
                    'contact_us' => 'ติดต่อ',
                    'solution_detail' => 'ที่ สมาร์ทคลิ๊ก โซลูชั่น เราเข้าใจดีว่าในยุคดิจิทัลในปัจจุบัน ธุรกิจต่างๆ ต้องการโซลูชันที่ล้ำสมัยเพื่อก้าวนำหน้าคู่แข่ง นั่นเป็นเหตุผลที่เรานำเสนอโซลูชันด้านไอที เว็บ และอุปกรณ์เคลื่อนที่ที่หลากหลายซึ่งปรับแต่งให้ตรงกับความต้องการเฉพาะของคุณ ไม่ว่าคุณจะเป็นสตาร์ทอัพขนาดเล็กหรือองค์กรขนาดใหญ่ ทีมผู้เชี่ยวชาญของเราทุ่มเทเพื่อให้บริการชั้นยอดเพื่อช่วยให้ธุรกิจของคุณเติบโต',
                    'smartclick_title' => '"บริษัท สมาร์ทคลิ๊ก โซลูชั่น จำกัด ที่จะตอบสนองทุกความต้องการของคุณ"',
                    'smartclick_detail' => 'บริษัท สมาร์ทคลิ๊ก โซลูชั่น จำกัด ก่อตั้งขึ้นในปี พ.ศ. 2547 ดำเนินกิจการทางด้าน Website Development, Mobile Application, Online Marketing, Streaming Solution, IOT, Cloud, AI หรือเรียกได้ว่าเราเป็นศูนย์รวมการให้บริการแบบครบวงจรบนโลกออนไลน์โดยมีวัตถุประสงค์ในการสร้างบริษัทที่มีการให้บริการแบบครบวงจรที่ได้มาตราฐาน มีคุณภาพ ในราคาที่เหมาะสมกับขนาดธุรกิจของลูกค้าและให้ลูกค้าได้รับประโยชน์สูงสุดเมื่อใช้บริการของเรา ตลอดระยะเวลาที่ผ่านมา เรามีบุคลากรที่มีคุณภาพ ประสบการณ์สูงเเละปรับตัวให้เข้ากับโลกเทคโนโลยีที่ทันสมัยอย่างต่อเนื่อง เพื่อให้บริการกับลูกค้าได้อย่างมีประสิทธิภาพ ด้วยเหตุนี้ปัจจุบันจึงมีลูกค้าที่ไว้วางใจใช้บริการกับเรากว่า 500 ราย โดยมีทั้งหน่วยงานราชการ เอกชน และบุคคลทั่วไป',
                    'mission' => 'ภารกิจของเราคือการเป็นพันธมิตรด้านโซลูชันไอทีที่น่าเชื่อถือและเป็นนวัตกรรม ช่วยให้ธุรกิจสามารถควบคุมศักยภาพของเทคโนโลยีอย่างเต็มที่เพื่อขับเคลื่อนการเติบโต ประสิทธิภาพ และความสำเร็จ เรามุ่งมั่นที่จะนำเสนอโซลูชั่นที่ปรับแต่งตามความต้องการเฉพาะของลูกค้าแต่ละราย เพื่อให้มั่นใจถึงการรวมเทคโนโลยีเข้ากับการดำเนินงานของพวกเขาอย่างราบรื่น',
                    'vision' => 'ที่ สมาร์ทคลิ๊ก โซลูชั่น วิสัยทัศน์ของเราไปไกลกว่าการเป็นผู้ให้บริการ IT solution รายอื่น เรามองเห็นอนาคตที่ธุรกิจทุกขนาดในอุตสาหกรรมต่างๆ ได้รับอำนาจให้ใช้ประโยชน์จากศักยภาพของเทคโนโลยีอย่างเต็มที่เพื่อขับเคลื่อนนวัตกรรม การเติบโต และความสำเร็จที่ยั่งยืน วิสัยทัศน์ของเรายึดหลักสามเสาหลักที่กำหนดแนวทางและความมุ่งมั่นของเราที่มีต่อลูกค้า พนักงาน และชุมชนทั่วโลก',
                    'ceo_name' => 'ยอดยิ่ง ชุมแสง ณ อยุธยา',
                    'ceo_message_1-1' => 'เรียน ลูกค้าผู้มีอุปการะคุณ และสมาชิกในทีม',
                    'ceo_message_1' => 'ผมมีความยินดีที่ได้ต้อนรับทุกท่านในฐานะ CEO ของ สมาร์ทคลิ๊ก โซลูชั่น นับตั้งแต่ก่อตั้ง เราได้เริ่มปฏิบัติภารกิจในการกำหนดแนวทางใหม่ที่ธุรกิจใช้ประโยชน์จากเทคโนโลยีเพื่อให้บรรลุวัตถุประสงค์ วันนี้ ผมรู้สึกภาคภูมิใจ ไม่เพียงแต่ในฐานะผู้นำขององค์กรนี้เท่านั้น แต่ยังเป็นผู้มีวิสัยทัศน์ที่มุ่งมั่นที่จะขับเคลื่อนนวัตกรรมและมอบความเป็นเลิศในทุกความพยายาม ที่ สมาร์ทคลิ๊ก โซลูชั่น เราเชื่อในพลังของเทคโนโลยีที่จะกำหนดอนาคตที่ดีกว่า การเดินทางของเราได้รับคำแนะนำจากความมุ่งมั่นอันแน่วแน่ในการเสริมศักยภาพธุรกิจ ช่วยให้พวกเขาพร้อมรับความก้าวหน้าทางเทคโนโลยี และเติบโตในภูมิทัศน์ดิจิทัลที่พัฒนาตลอดเวลา ในขณะที่เราเติบโตอย่างต่อเนื่อง โฟกัสของเรายังคงไม่ยอมแพ้: เพื่อสร้างโซลูชันการเปลี่ยนแปลงที่ขับเคลื่อนธุรกิจของคุณไปสู่ความสำเร็จอย่างที่ไม่เคยมีมาก่อน',
                    'ceo_message_2-1' => 'ความมุ่งมั่นสู่ความเป็นเลิศทางเทคโนโลยี',
                    'ceo_message_2' => 'ในยุคแห่งความก้าวหน้าทางเทคโนโลยีอย่างรวดเร็วนี้ ความอิ่มเอมใจไม่ใช่ทางเลือก นั่นเป็นเหตุผลที่เรามุ่งสู่ความเป็นเลิศทางเทคโนโลยีอย่างไม่ลดละ ทีมงานมืออาชีพที่มีความสามารถของเราผลักดันขอบเขตของนวัตกรรมอย่างต่อเนื่อง สำรวจพรมแดนใหม่เพื่อนำเสนอโซลูชั่นที่ทันสมัยและล้ำสมัยที่สุดให้กับคุณ เราลงทุนในด้านการวิจัยและพัฒนา ส่งเสริมวัฒนธรรมแห่งการเรียนรู้และการเติบโตอย่างต่อเนื่อง ความมุ่งมั่นที่จะก้าวล้ำนำหน้านี้ทำให้มั่นใจได้ว่าลูกค้าของเราจะได้รับโซลูชันที่ไม่เพียงแต่มีประสิทธิภาพในปัจจุบันเท่านั้น แต่ยังรองรับความท้าทายในอนาคตอีกด้วย',
                    'ceo_message_3-1' => 'การสร้างพันธมิตรที่ยั่งยืน',
                    'ceo_message_3' => 'ความสำเร็จของ สมาร์ทคลิ๊ก โซลูชั่น เชื่อมโยงกับความสำเร็จของลูกค้าและพันธมิตรของเราอย่างแยกไม่ออก เราเชื่อในการสร้างพันธมิตรที่มีความหมายและยั่งยืนซึ่งขยายออกไปนอกเหนือไปจากการติดต่อทางธุรกรรม ลูกค้าของเราคือหัวใจสำคัญของทุกสิ่งที่เราทำ และเราภูมิใจที่เข้าใจความต้องการและแรงบันดาลใจที่ไม่เหมือนใครของพวกเขา
                    แนวทางที่เน้นลูกค้าเป็นศูนย์กลางหมายความว่าเรารับฟังอย่างตั้งใจ สื่อสารอย่างโปร่งใส และทำงานร่วมกันอย่างใกล้ชิดกับคุณตลอดการเดินทาง เราให้ความสำคัญกับความคิดเห็นของคุณและมุ่งมั่นที่จะปรับปรุงบริการของเราอย่างต่อเนื่องเพื่อตอบสนองความคาดหวังของคุณให้ดียิ่งขึ้น',
                    'ceo_message_4-1' => 'การเสริมสร้างพลังแห่งอนาคตที่ยั่งยืน',
                    'ceo_message_4' => 'ในฐานะพลเมืององค์กรที่มีความรับผิดชอบ เราตระหนักดีถึงหน้าที่ของเราที่จะมีส่วนร่วมในเชิงบวกต่อโลกรอบตัวเรา วิสัยทัศน์ของเราขยายไปไกลกว่าผลกำไรเพื่อสร้างผลกระทบที่มีความหมายต่อสังคมและสิ่งแวดล้อม เราอุทิศตนเพื่อแนวทางปฏิบัติที่ยั่งยืนโดยมีเป้าหมายเพื่อลดรอยเท้าทางนิเวศน์ของเราให้เหลือน้อยที่สุดและมีส่วนร่วมในอนาคตที่เป็นมิตรกับสิ่งแวดล้อมและยั่งยืนยิ่งขึ้น ยิ่งกว่านั้น เรายังมีความกระตือรือร้นที่จะเชื่อมโยงการแบ่งแยกทางดิจิทัล ทำให้ทุกคนสามารถเข้าถึงเทคโนโลยีได้ ด้วยความคิดริเริ่มที่ส่งเสริมความรู้ด้านดิจิทัลและสนับสนุนชุมชนที่ด้อยโอกาส เรามีเป้าหมายที่จะส่งเสริมบุคคลให้ตระหนักถึงศักยภาพสูงสุดของตนเองผ่านทางเทคโนโลยี
                    <br><br>
                    สุดท้ายนี้ ผมอยากจะแสดงความขอบคุณจากใจจริงต่อลูกค้า คู่ค้า และสมาชิกในทีมที่นับถือของเรา ความไว้วางใจ ความภักดี และความทุ่มเทของคุณเป็นแรงผลักดันเบื้องหลังความสำเร็จของเรา เรายึดมั่นในความสัมพันธ์ที่เราได้สร้างขึ้นในช่วงหลายปีที่ผ่านมาและหวังว่าจะได้ให้บริการคุณต่อไปด้วยความมุ่งมั่นและความหลงใหลที่ไม่เปลี่ยนแปลง ถึงทีมงานที่ยอดเยี่ยมของเราที่ สมาร์ทคลิ๊ก โซลูชั่น ผมขอปรบมือให้กับการทำงานหนัก ความคิดสร้างสรรค์ และความกระตือรือร้นของทุกคน ความพยายามอย่างไม่รู้จักเหน็ดเหนื่อยและความมุ่งมั่นสู่ความเป็นเลิศของคุณที่ทำให้วิสัยทัศน์ของเราเป็นจริง เราร่วมกันสร้างพลังอันน่าเกรงขาม ร่วมกันแสวงหาการเปลี่ยนแปลงธุรกิจผ่านเทคโนโลยี
                    <br><br>
                    <b style="color:black">
                            [ยอดยิ่ง ชุมแสง ณ อยุธยา] <br>
                            CEO, [Smartclick Solution Co.,Ltd.]
                    </b>',


               ),
               'en' => array(
                    'lng' => 'en',
                    'homepage' => 'Home',
                    'about' => 'About',
                    'companyprofile' => 'Company Profile',
                    'message' => 'Message From CEO',
                    'management' => 'Management',
                    'history' => 'Timeline,',
                    'knowledge/news' => 'Knowledge/News',
                    'knowledge' => 'Knowledge',
                    'news' => 'News',
                    'seminar' => 'Seminar',
                    'solution' => 'Solution',
                    'enterprise_application' => 'Enterprise Application',
                    'datacenter' => 'Data Center and Cloud',
                    'marketing' => 'Digital Marketing',
                    'streaming' => 'Streaming Solution',
                    'it_support' => 'IT Support',
                    'contact_us' => 'Contact',
                    'solution_detail' => "At Smartclick Solution Co.,Ltd. we understand that in today's digital era, businesses need cutting-edge solutions to stay ahead of the competition. That's why we offer a wide range of IT, web, and mobile solutions tailored to meet your unique requirements. Whether you are a small startup or a large enterprise, our team of experts is dedicated to providing top-notch services to help your business thrive.",
                    'smartclick_title' => '"Smart Click Solution Co., Ltd. that will meet all your needs."',
                    'smartclick_detail' => "Smart Click Solution Co., Ltd. was established in 2004, operating in the areas of Website Development, Mobile Application, Online Marketing, Streaming Solution, IOT, Cloud, AI or can be called as a service center. One-stop service in the online world with the objective of creating a company that provides a one-stop service that meets quality standards at a price that is suitable for the size of the customer's business and allows customers to get the most benefits when using our services. Throughout the past We have qualified personnel. Highly experienced and constantly adapting to the modern technology world in order to provide services to customers efficiently For this reason, there are currently more than 500 customers who trust our services, including government agencies, private individuals and individuals. ",
                    'mission' => 'Our mission is to be a trusted and innovative IT solution partner, empowering businesses to harness the full potential of technology to drive growth, efficiency, and success. We strive to deliver tailor-made solutions that cater to the unique needs of each client, ensuring a seamless integration of technology into their operations.',
                    'vision' => 'At Smartclick Solution Co.,Ltd. our vision goes beyond being just another IT solutions provider. We envision a future where businesses of all sizes, across various industries, are empowered to harness the full potential of technology to drive innovation, growth, and sustainable success. Our vision is anchored in three core pillars that define our approach and commitment to our clients, employees, and the global community.',
                    'ceo_name' => 'Yodying Xumsaeng',
                    'ceo_message_1-1' => 'Dear Valued Clients, Partners, and Team Members,',
                    'ceo_message_1' => 'I am delighted to address you all as the CEO of Smartclick Solution Co.,Ltd. Since our inception, we have embarked on a mission to redefine the way businesses leverage technology to achieve their objectives. Today, I stand proud, not only as the leader of this incredible organization but also as a visionary committed to driving innovation and delivering excellence in every endeavor. <br>
                    At Smartclick Solution Co.,Ltd. we believe in the power of technology to shape a better future. Our journey has been guided by a steadfast commitment to empowering businesses, enabling them to embrace technological advancements, and thrive in an ever-evolving digital landscape. As we continue to grow, our focus remains unyielding: to create transformative solutions that propel your business towards unprecedented success.',
                    'ceo_message_2-1' => 'A Commitment to Technological Excellence',
                    'ceo_message_2' => "In this era of rapid technological advancements, complacency is not an option. That's why we relentlessly pursue technological excellence. Our team of talented professionals is constantly pushing the boundaries of innovation, exploring new frontiers to bring you the most advanced and cutting-edge solutions. <br>
                    We invest in research and development, fostering a culture of continuous learning and growth. This commitment to staying ahead of the curve ensures that our clients receive solutions that are not only effective today but also future-proofed for tomorrow's challenges.",
                    'ceo_message_3-1' => 'Building Lasting Partnerships',
                    'ceo_message_3' => 'The success of Smartclick Solution Co.,Ltd. is inextricably linked to the success of our clients and partners. We believe in building meaningful and lasting partnerships that extend beyond transactional interactions. Our clients are at the core of everything we do, and we take pride in understanding their unique needs and aspirations.<br>
                    Our client-centric approach means that we listen attentively, communicate transparently, and collaborate closely with you throughout the journey. We value your feedback and strive to continuously improve our services to better meet your expectations.',
                    'ceo_message_4-1' => 'Empowering a Sustainable Future',
                    'ceo_message_4' => 'As a responsible corporate citizen, we recognize our duty to contribute positively to the world around us. Our vision extends beyond profit margins to make a meaningful impact on society and the environment. We are dedicated to sustainable practices, aiming to minimize our ecological footprint and contribute to a greener, more sustainable future.<br>
                    Moreover, we are passionate about bridging the digital divide, making technology accessible to all. Through initiatives that promote digital literacy and support underserved communities, we aim to empower individuals to realize their full potential through technology.<br>
                    Lastly, I want to extend my heartfelt gratitude to our esteemed clients, partners, and team members. Your trust, loyalty, and dedication have been the driving force behind our success. We cherish the relationships we have built over the years and look forward to continuing to serve you with unwavering commitment and passion.<br>
                    To our exceptional team at Smartclick Solution Co.,Ltd. I applaud your hard work, creativity, and enthusiasm. It is your tireless efforts and commitment to excellence that make our vision a reality. Together, we form a formidable force, united in our pursuit of transforming businesses through technology.<br>
                    Sincerely,
                    <br> <br>
                    <b style="color:black">
                    [Yodying Xumsaeng] <br>
                    CEO, [Smartclick Solution Co.,Ltd.]
                    </b>',

               )
          )
     );

     $language = $ci->session->userdata("CURRENT_LANGUAGE");

     if (empty($language)) {
          $ci->session->set_userdata("CURRENT_LANGUAGE", "th");
          $language = $ci->session->userdata("CURRENT_LANGUAGE");
     }

     return $configurations[$page][$language][$key];
}
