<!DOCTYPE html>

<html>

<head>

<?php include "includes/header.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">



<style>

.dataTables_wrapper .dataTables_paginate .paginate_button {

    box-sizing: border-box;

    display: inline-block;

    min-width: 1.5em;

    padding: 0px;

    margin-left: 2px;

    text-align: center;

    text-decoration: none !important;

    cursor: pointer;

    *cursor: hand;

    color: #333 !important;

    border: 1px solid transparent;

    border-radius: 2px;

}

thead {

    font-size: 15px;

    font-weight: 600;

    color: black;

    text-align: center;

    text-transform: uppercase;

}

</style>





</head>



<body class="hidden-bar-wrapper">



<div class="page-wrapper">

 	

    <!-- Preloader -->

    <div class="preloader"></div>

 	

 	<!-- Main Header-->

    <?php include "includes/menu.php"; ?>

    <!--End Main Header -->

	

	<!--Page Title-->

    <section class="page-title" style="background-image:url(images/background/12.jpg);">

    	<div class="auto-container">

        	<div class="row clearfix">

            	<!--Title -->

            	<div class="title-column col-lg-6 col-md-12 col-sm-12">

                	<h1>Training Centers</h1>
					

                </div>

                <!--Bread Crumb -->

                <div class="breadcrumb-column col-lg-6 col-md-12 col-sm-12">

                    <ul class="bread-crumb clearfix">

                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>

                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> Training Centers</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    <!--End Page Title-->

	

	<!-- Welcome Section -->

	<section class="welcome-section">

		<div class="auto-container">

			<div class="row clearfix">

				

				<!-- Content Column -->

				<div class="content-column col-lg-12 col-md-12 col-sm-12">

					<div class="inner-column">

						<h2>Training <span class="theme_color"> Centers</span>
						<!--a href="tc_map.php" class="btn btn-success pull-right">View in Map</a-->
						</h2>

						

						<div class="">
							
							
							
	<table id="example" class="table table-bordered" style="width:100%" >
	<thead>

		<tr>
			<th>S NO</th>
			<th>NAME OF TRAINING CENTRES</th>
			<th>State</th>
			<th>ADDRESS</th>
		</tr>

    </thead>

    <tbody>

    <tr>
        <td>1</td>
        <td>DATAPRO COMPUTERS PVT. LTD.</td>
        <td>ANDHRA PRADESH</td>
        <td>TRAINING CENTRE-TATA NAGAR, NEAR TOP-KAPALI, SARAIKELA KHARSAWAN, KAPALI, JHARKHAND, 8301012  CORPORATE ADDRESS-9-14-1, FLAT NO 301 &amp; 302, 2ND FLOOR, KOTU EMPIRE, VIP ROAD, CBM COMPOUND, SIRIPURAM, VISHAKHAPATNAM, 530003</td>
    </tr>
    <tr>
        <td>2</td>
        <td>NATIONAL ACADEMY OF CONSTRUCTION </td>
        <td>ANDHRA PRADESH</td>
        <td>D.NO. 54-14/8-21, LANE NO.6, BHARATHI NAGAR, VIJAYAWADA, KRISHNA DISTRICT - 520008, ANDRHA PRADESH</td>
    </tr>
    <tr>
        <td>3</td>
        <td>CAREER WALK</td>
        <td>ANDHRA PRADESH</td>
        <td>D NO. 27-18-63, 2ND FLOOR OPP CONGRESS PARTY OFFICE, VIJAYAWADA</td>
    </tr>
    <tr>
        <td>4</td>
        <td>SKILL DEVELOPMENT INSTITUTE (SDI) VISAKHAPATNAM</td>
        <td>ANDHRA PRADESH</td>
        <td>GVMC-ZONAL OFFICE BUILDINGS, T.S.NO. 26-27, DEENADAYALPURAM, MUDASARLOVA</td>
    </tr>
    <tr>
        <td>5</td>
        <td>PROFEXO EDUTECH PVT.LTD.</td>
        <td>ANDHRA PRADESH</td>
        <td>H/NO. 20, M/918/SM/201.12, SERILINGAM PALLY2, MIYAPUR HYDERABAD,RANGA REDDY, TELANGANA-500049</td>
    </tr>
    <tr>
        <td>6</td>
        <td>VALEUR FABTEX PRIVATE LIMITED.</td>
        <td>ASSAM</td>
        <td>OLD BSNL BUILDING ,1ST FLOOR, MANCOTTA ROAD CHOWKIDINGHEE NEAR FLYOVER DIBRUGARH, 786001 (ASSAM) </td>
    </tr>
    <tr>
        <td>7</td>
        <td>TINSUKIA HINDI WOMEN EDUCATION SOCIETY</td>
        <td>ASSAM</td>
        <td>WEST SRIPURIA, TINSUKIA, NEAR 700 NO. RLY. GATE, TINSUKIA, ASSAM, 786145</td>
    </tr>
    <tr>
        <td>8</td>
        <td>AJITAAKSH VENTURES PRIVATE LIMITED</td>
        <td>ASSAM</td>
        <td>AKSHAT TOWERS BORSOJAI NEAR GAMES VILLAGE NH 37</td>
    </tr>
    <tr>
        <td>9</td>
        <td>VALEUR FABTEX PRIVATE LIMITED</td>
        <td>ASSAM</td>
        <td>MULTIDISCIPLINARY SKILL DEVELOPMENT CENTRE, SADIYA, TINSUKIA</td>
    </tr>
    <tr>
        <td>10</td>
        <td>LUIT EDUCATION PVT.LTD.</td>
        <td>ASSAM</td>
        <td>29, KHISHNAPUR, AG OFFICE ROAD, BETTOLA, GUWAHATI- 781022</td>
    </tr>
    <tr>
        <td>11</td>
        <td>DARPAN NGO</td>
        <td>ASSAM</td>
        <td>H.NO.03, MA SIX MILE, GUWAHATI ,PIN-781022</td>
    </tr>
    <tr>
        <td>12</td>
        <td>ASSIST INDIA</td>
        <td>BIHAR</td>
        <td>KHASRA NO. 932 MITHILA ITI JAMAL CHOWK PO- LALBAG</td>
    </tr>
    <tr>
        <td>13</td>
        <td>BHASKAR FOUNDATION (CHANGED TO BHAVSAR FOUNDATIONS)</td>
        <td>DELHI</td>
        <td>401-4025 4TH FLOOR RATTAN JYOTI BUILDING, 18, RAJENDRA PLACE, NEW DELHI-110008</td>
    </tr>
    <tr>
        <td>14</td>
        <td>CREDAI</td>
        <td>DELHI</td>
        <td>703 ANSAL BHAWAN ,16 K.G. MARG , NEW DELHI – 110001  </td>
    </tr>
    <tr>
        <td>15</td>
        <td>APPLETREE SKILL ACADEMY PVT.LTD.</td>
        <td>DELHI</td>
        <td>FLAT NO.66B, KALKAJI EXTENSION, PKT A-14, DELHI-110019</td>
    </tr>
    <tr>
        <td>16</td>
        <td>INSTITUTE OF BUSSINESSLAGAO</td>
        <td>DELHI</td>
        <td>F-BLOCK, NETAJI SUBASH MARG, PALAM COLONY, RAJNAGAR-2, NEW DELHI-110077</td>
    </tr>
    <tr>
        <td>17</td>
        <td>LOK BHARTI GROUP</td>
        <td>DELHI</td>
        <td>&quot;43, FIRST FLOOR, COMMUNITY CENTER, PH-1, NARAINA INDUSTRIAL AREA,NARAINA, NEW DELHI- 110028&quot;</td>
    </tr>
   
    <tr>
        <td>18</td>
        <td>AICWA ( ALL INDIA CONSTRUCTION WORKER ASSOCIATION)</td>
        <td>GUJARAT</td>
        <td>AICWA, ALLAHABAD  CINEMA, NAROAD, AHMEDABAD, GUJARAT-382330</td>
    </tr>
    <tr>
        <td>19</td>
        <td>CSIR-CENTRAL SALT &amp; MARINE CHEMICALS RESEARCH INSTITUTE</td>
        <td>GUJARAT</td>
        <td>&quot;GIJUBHAI BADHEKA MARG, CSIR-CSMCRI, WAGHAWADI ROAD&quot;</td>
    </tr>
  
    <tr>
        <td>20</td>
        <td>AMASS SKILLS VENTURES PVT.LTD.</td>
        <td> HARYANA</td>
        <td>2ND FLOOR, SHRI KRISHNA DHARAM KANTA COMPLEX, NAHARPUR ROPA MORE, OPP.ANAJ MANDI, N.H.-8 , GURGAON-122001</td>
    </tr>
    <tr>
        <td>21</td>
        <td>EDUJOIN TRAINING FOUNDATION</td>
        <td>HARYANA</td>
        <td>541/18, NEW TARA NAGAR, SONIPAT HARYANA 131001</td>
    </tr>
    <tr>
        <td>22</td>
        <td>SIDHU CREATION PRIVATE LIMITED</td>
        <td>HARYANA</td>
        <td>KHASHRA NO 52, GROUND FLOOR, DEVRALA, BHIWANI, HARYANA (127029)</td>
    </tr>
    <tr>
        <td>23</td>
        <td>SIDHU CREATION PRIVATE LIMITED</td>
        <td>HARYANA</td>
        <td>PLOT NO-40, OPPOSITE SHIV MANDIR, SATROAD KHASS, HISAR, HARYANA, 125044</td>
    </tr>
    <tr>
        <td>24</td>
        <td>INDEVA</td>
        <td>HARYANA</td>
        <td>716, BLOCK-11, MILAP NAGAR, AMBALA CITY, HARYANA-134003</td>
    </tr>
    <tr>
        <td>25</td>
        <td>INNOVISION LIMITED</td>
        <td>HARYANA</td>
        <td>BUILDING NO 413, TER ROAD,PINANGWAN NEAR NIKKY MODEL SCHOOL,PINANGWAN MEWAT, HARYANA - 122508.</td>
    </tr>
    <tr>
        <td>26</td>
        <td>ZACLON INDIA LIMITED</td>
        <td>HARYANA</td>
        <td>HOUSE NUMBER-1, MC COLONY, BAWRI GATE, BHIWANI, DISTRICT-BHIWANI, HARYANA-127021</td>
    </tr>
    <tr>
        <td>27</td>
        <td>EDUJOIN TRAINING FOUNDATION</td>
        <td>HARYANA</td>
        <td>H, NO 110/8 MARLA MODEL TOWN SONIPAT HARYANA</td>
    </tr>
    <tr>
        <td>28</td>
        <td>EDUJOIN TRAINING FOUNDATION</td>
        <td>HARYANA</td>
        <td>H, NO. 118 , NEAR GOVT. TOBWEL, GALI NO. 2 , RAJ NAGAR , PANIPAT HARYANA</td>
    </tr>
    <tr>
        <td>29</td>
        <td>ZACLON INDIA LIMITED</td>
        <td>HARYANA</td>
        <td>INDUSTRIAL TRAINING  INSTITUTE  MUBARIKPUR  BISRU  ROAD PUNHANA NUH HARYANA 122508</td>
    </tr>
    <tr>
        <td>30</td>
        <td>G&amp;G SKILL DEVELOPMENT</td>
        <td>HARYANA</td>
        <td>GUPTA NURSING HOME COMPLEX,MAIN ROAD RAIPUR, DISTRICT PUNCHKULA, HARYANA-134204</td>
    </tr>
    <tr>
        <td>31</td>
        <td>DEV SOLAR PVT.LTD.</td>
        <td>HARYANA</td>
        <td>20B, 2ND FLOOR, IRIS TECH PARK, SOHNA ROAD, GURUGRAM, HARYANA-122013</td>
    </tr>
    <tr>
        <td>32</td>
        <td>VLCC  HEALTHCARE LTD.</td>
        <td> HARYANA</td>
        <td>64,HSIDC, SECTOR-18, MARUTI INDUSRIAL AREA, GURUGRAM-122015</td>
    </tr>
    <tr>
        <td>33</td>
        <td>VEMOSA SKILLS PRIVATE LIMITED</td>
        <td>HIMACHAL PRADESH</td>
        <td>PLOT NO 10 BHAWARNA, BHAWARNA, 176061</td>
    </tr>
    <tr>
        <td>34</td>
        <td>PLAN FOUNDATIONS</td>
        <td>HIMACHAL PRADESH</td>
        <td>BROADWAY ENCLAVE, SANJAULI, SHIMLA,H.P.</td>
    </tr>
    <tr>
        <td>35</td>
        <td>EMPIRE EDUCATION SOCIETY</td>
        <td>HIMACHAL PRADESH</td>
        <td>110/13, NEAR POLICE STATION PADDAL, MANDI-175001, </td>
    </tr>
    <tr>
        <td>36</td>
        <td>APPLETREE SKILL ACADEMY PVT.LTD.</td>
        <td>HIMACHAL PRADESH</td>
        <td> TRAINING CENTER, SHIMLA</td>
    </tr>
    <tr>
        <td>37</td>
        <td>THE PLANET EDUCATION SOCIETY</td>
        <td>HIMACHAL PRADESH</td>
        <td>HN-72, SHAMSHERPURI, PAONTA SAHIB,DISTT. SIRMOUR, H.P.-1730026</td>
    </tr>
    <tr>
        <td>38</td>
       
        <td>CALANCE SOFTWARE PRIVATE LIMITED&quot;</td>
        <td>HIMACHAL PRADESH</td>
        <td>VPO ARKI, DISTRICT SOLAN, HP, 173208</td>
    </tr>
    <tr>
        <td>39</td>
        <td>VERTEX EDUCATIONAL SOCIETY</td>
        <td>HIMACHAL PRADESH</td>
        <td>NEAR POST OFFICE KOTLA NALA SOLAN, HP, 173212</td>
    </tr>
    <tr>
        <td>40</td>
        <td>G. K. INSTITUTE OF TRAINING &amp; RESEARCH</td>
        <td>JAMMU &amp; KASHMIR</td>
        <td>DURGA VIHAR, TOLL POST, NAGROTA JAMMU, J&amp;K-181221</td>
    </tr>
    <tr>
        <td>41</td>
        <td>SAI INSTITUTE OF IT AND MANAGEMENT</td>
        <td>JAMMU &amp; KASHMIR</td>
        <td>2ND FLOOR, JANDYAL PLAZA, SUNDERBANI-185153 (J&amp;K)</td>
    </tr>
    <tr>
        <td>42</td>
        <td>CARE COLLEGE</td>
        <td>JAMMU &amp; KASHMIR</td>
        <td>215 NEAR JK BANK REAHRI, BHARAT NAGAR,JAMMU-180001</td>
    </tr>
    <tr>
        <td>43</td>
        <td>WYATH SERVICES PRIVATE LIMITED</td>
        <td>JAMMU &amp; KASHMIR</td>
        <td>&quot;WYATH SERVICES PRIVATE LIMITED, TOP FLOOR MEGA MALL PANTHA CHOWK, SRINAGAR J&amp;K INDIA- 191101&quot;</td>
    </tr>
   
    <tr>
        <td>44</td>
        <td>NIESBUD MIN  OF SSI GOVT OF IN</td>
        <td>JAMMU AND KASHMIR</td>
        <td>KULOOSA BANDIPORA NEAR INTERNATIONAL DELHI PUBLIC SCHOOL-193502</td>
    </tr>
    <tr>
        <td>45</td>
        <td>S.G.R.S ACADEMIC PVT LTD.</td>
        <td>JHARKHAND</td>
        <td>3RD FLOOR, SRI MOHAN BUILDING, SITA COMPOUND 5, NEAR OVER BRIDGE, MAIN ROAD, RANCHI-834001</td>
    </tr>
    <tr>
        <td>46</td>
        <td>SGRS ACADEMIC PRIVATE LIMITED</td>
        <td>JHARKHAND</td>
        <td>PLOT NO. - 70, KHASRA NO. -130, VILL-SAGALIM,BLOCK – PANKI, P.O- SAGALIM ,P.S – PANKI NEAR SAGALIM BUS STAND, PALAMU -822118</td>
    </tr>
    <tr>
        <td>47</td>
        <td>LABOURNET SERVICES INDIA PVT. LTD</td>
        <td>KARNATAKA</td>
        <td>25/1-4, 19TH &quot;A&quot; MAIN, 9TH CROSS, JP NAGAR 2ND PHASE, BANGALORE-560078, KARNATAKA,</td>
    </tr>
    <tr>
        <td>48</td>
        <td>DEEPAM SKILL DEVELOPMENT</td>
        <td>KARNATAKA</td>
        <td>S.NO.7, (P) ELCIA COMPLEX, ELECTRONIC CITY, WEST PHASE, BENGALURU, KARNATAKA-560100</td>
    </tr>
    <tr>
        <td>49</td>
        <td>ASHIRVAD PLUMBING SCHOOL</td>
        <td>KARNATAKA</td>
        <td>&quot;ASHIRVAD PLUMBING SCHOOL SURVEY NO. 26B, ATTIBELE INDUSTRIAL AREA, ATTIBELE, BANGALORE - 562107&quot;</td>
    </tr>
   
    <tr>
        <td>50</td>
        <td>SANSKAR EDUCATION HUB</td>
        <td>MADHYA PRADESH</td>
        <td>ADALAT KE PASS, JATARA, 472118 TIKAMGARH MP</td>
    </tr>
    <tr>
        <td>51</td>
        <td>ADEPT EDUSYS PVT LTD</td>
        <td>MADHYA PRADESH</td>
        <td>H. NO. 224, WARD NO 01, JUNAVAS, NEAR GOVIND KUND, SAILANA, MADHYA PRADESH</td>
    </tr>
    <tr>
        <td>52</td>
        <td>ADEPT EDUSYS PVT LTD</td>
        <td>MADHYA PRADESH</td>
        <td>HOUSE NO 245, USHA NAGAR, INFRONT OF RANJEET HANUMAN, INDORE</td>
    </tr>
    <tr>
        <td>53</td>
        <td>RAVI SIKSHA SANTHAN EVAM SAMAJ KALYAN SIMITY</td>
        <td>MADHYA PRADESH</td>
        <td>RAVI SIKSHA SANTHAN EVAM SAMAJ KALYAN SIMITY, BHOPAL, M.P.</td>
    </tr>
    <tr>
        <td>54</td>
        <td>SOCIETY FOR HUMAN ADVANCEMENT &amp; PROGRESSIVE EDUCATION (SHAPE)</td>
        <td>MADHYA PRADESH</td>
        <td>251, JAWAHAR MARG, BADJATYA CHAMBER, OPP. VAISHNAVI SCHOOL, RAJ MOHALLA, INDORE-452002</td>
    </tr>
    <tr>
        <td>55</td>
        <td>BLACK PANTHER GUARDS &amp; SERVICES PVT.LTD.</td>
        <td>MADHYA PRADESH</td>
        <td>405, SHRIVERDHAN COMPLEX, 4 RNT MARG, INDORE-452001</td>
    </tr>
    <tr>
        <td>56</td>
        <td>PIDILITE INDUSTRIES LTD</td>
        <td>MAHARASHTRA</td>
        <td>RAMKRISHNA MANDIR ROAD, ANDHERI (E), P.O BOX NO. 17411, MUMBAI-400059</td>
    </tr>
    <tr>
        <td>57</td>
        <td>DNYANADA INSTITUTE OF FLOW PIPING TECHNOLOGY (DIFPT)</td>
        <td>MAHARASHTRA</td>
        <td>S.N. 44/134, NAVSAHYADRI SOCIETY, KARVENAGAR, PUNE-411052</td>
    </tr>
    <tr>
        <td>58</td>
        <td>PIPAL TREE VENTURES PVT LTD</td>
        <td>MAHARASHTRA</td>
        <td>108/109, MEHTA INDUSTRIAL ESTATE, I.B PETROL ROAD, GOREGAON, MUMBAI-400063</td>
    </tr>
    <tr>
        <td>59</td>
        <td>PRATHAM EDUCATION FOUNDATION</td>
        <td>MAHARASHTRA</td>
        <td>28/A, KAMGARNAGAR, OFF. SG BARVE MARG, KURLA(E), MUMBAI-400024</td>
    </tr>
    <tr>
        <td>60</td>
        <td>SOCIETY FOR HUMANE INTEGRATED VISIONARY ALLIED SHIVA</td>
        <td>MAHARASHTRA</td>
        <td>THROUGH ADARSH VIDYAMANDIR OLD SUBHEDAR LAYOUT NAGAR 440009</td>
    </tr>
    <tr>
        <td>61</td>
        <td>THE SUPREME INDUSTRIES LTD.</td>
        <td> MAHARASHTRA</td>
        <td>GATE NO.47,48 AT POST GADEGOAN, TAL JAMNER, DIST. JALGOAN, MAHARASHTRA</td>
    </tr>
    <tr>
        <td>62</td>
        <td>KOUSHALY VIKAS VYAVSAY PRASHIKSHAN VA SHAIKSHANIK BAHU SHIKSHAN SANSTHA</td>
        <td>MAHARASHTRA</td>
        <td>PLOT NO:- 45, SANT GOROBA BHAVAN , SHASHI NAGAR , BADNERA ROAD, AMARAWATI 444607</td>
    </tr>
    <tr>
        <td>63</td>
        <td>S S INFOTECH</td>
        <td>MAHARASHTRA</td>
        <td>PLOT. NO.3 NEW BARK AT PURANA NANDED, NANDED WAGHALA, NANDED.431601.</td>
    </tr>
    <tr>
        <td>64</td>
        <td>YHNSERVICES PVT LTD</td>
        <td>MAHARASHTRA</td>
        <td>111, ATHWALE COLLEGE OF SOCIAL WORK STATION ROAD BHANDARA MAHARASTRA</td>
    </tr>
    <tr>
        <td>65</td>
        <td>EKTARA SKILL DVELOPMENT</td>
        <td>MAHARASHTRA</td>
        <td>H NO. 217, PAWAR COMPLEX, BHONDAVADE, SATARA LAVANGHAR ROAD, SATARA</td>
    </tr>
    <tr>
        <td>66</td>
        <td>SINDHUDURG SKILL AND INFORMATION TECHNOLOGY</td>
        <td>MAHARASHTRA</td>
        <td>&quot;HOUSE NO 2367 , RAOSAHEB GOGATE COLLEGE OF COMMERCE,PANWAL, BANDA, DODAMARG ROAD, BANDA,&quot;</td>
    </tr>
    <tr>
        <td></td>
    </tr>
   
    <tr>
        <td>67</td>
        <td>SANT TUKARAM MAHARAJ BAHUUDDESHIY SHIKSHAN SANSTHA NIMKARDA</td>
        <td>MAHARASHTRA</td>
        <td>261 ERANDA ROAD BARSHITAKLI AKOLA  KANHERI</td>
    </tr>
    <tr>
        <td>68</td>
        <td>IG COMPUTER EDUCATION</td>
        <td>MAHARASHTRA</td>
        <td>C/O DYP COLLEGE OF ENGG, RSN 865 A WARD, MORE MANE NAGAR, NR SALOHE NAGAR,KOLHAPUR</td>
    </tr>
    <tr>
        <td>69</td>
        <td>AADHAR BAHUUDDESHIYA SHIKSHAN SANSTHA</td>
        <td>MAHARASHTRA</td>
        <td>GAT 132, MAHALE SANKUL, UNDARI, CHIKHALI, UNDRI ROAD, BULDHANA</td>
    </tr>
    <tr>
        <td>70</td>
        <td>AARTI EDUCARE</td>
        <td>MAHARASHTRA</td>
        <td>S. NO. 222/1/A, PLOT NO. 58, EKDANTA COLONY, NEAR NMC WATER TANK, DGP NAGAR - 2, AMBAD, NASHIK</td>
    </tr>
    <tr>
        <td>71</td>
        <td>AAZAD HIND SEVABHAVI SANSTHA NANDURBAR</td>
        <td>MAHARASHTRA</td>
        <td>3054 SANT JAGNADE MAHARAJ SHIKSHAN MANDAL  KHAPAR (CT), AKKALKUVA</td>
    </tr>
    <tr>
        <td>72</td>
        <td>LORIYA TECHNICAL INSTITUTE</td>
        <td>MAHARASHTRA</td>
        <td>046 S R PATIL HIGH SCHOOL NEAR STADIUM WALWADI DHULE WALWADI DHULE GODUR ROAD DHULE</td>
    </tr>
    <tr>
        <td>73</td>
        <td>VEDANT PRIVATE ITI INSTITUTE</td>
        <td>MAHARASHTRA</td>
        <td>H. NO. 6486, TIRORA CHANDRABHAGA NAKA, SANT RAVIDAS WARD TIRORA</td>
    </tr>
    <tr>
        <td>74</td>
        <td>NIMJAI FOUNDATION</td>
        <td>MAHARASHTRA</td>
        <td>MU. P.O. JAMNERPURA,TALJAMNER, DIST JALGAON</td>
    </tr>
    <tr>
        <td>75</td>
        <td>DHARESHWAR MULTI SERVICES PRIVATE LIMITED</td>
        <td>MAHARASHTRA</td>
        <td>PLOT NO 3 TALEGAON TQ PHULAMBRI TALEGAON RAOD PHULAMBRI AURANGABAD 431111</td>
    </tr>
    <tr>
        <td>76</td>
        <td>RAKSHI SAMAJIK SANSTHAN </td>
        <td>MAHARASHTRA</td>
        <td>MUKKAM SANKALP, POST. TALUKA, MHASALA, DISTRICT RAIGARH, MAHARASHTRA</td>
    </tr>
    <tr>
        <td>77</td>
        <td> NEPTUNE ENTERPRISES SERVICE PROVIDER CONSULTANTS</td>
        <td>MAHARASHTRA</td>
        <td>SHOP NO.05, SHREEJI DARSHAN CHS , PLOT NO: 100, SECTOR-20, ULWE, NAVI MUMBAI-410206</td>
    </tr>
    <tr>
        <td>78</td>
        <td>NOVADAY KRISHI SANSHODHAN &amp; GRAMIN VIKAS PRATISHTHAN </td>
        <td>MAHARASHTRA</td>
        <td>PARIJAT PATH GAJANAN COLONY, SAHYADRI NAGAR, SANGLI-416416, MAHARSHTRA</td>
    </tr>
    <tr>
        <td>79</td>
        <td>PARAM SKILLS TRAINING (I) PVT.LTD.</td>
        <td>MAHARASHTRA</td>
        <td>PLOT NO.1, INFRANT OF BALBHARTI OFFICE , RAILWAY STATION,  MIDC AREA, VEDANT NAGAR AURANGABAD.</td>
    </tr>
    <tr>
        <td>80</td>
        <td>ACME INDIA MICROSYS PVT.LTD.</td>
        <td>MAHARASHTRA</td>
        <td>2ND FLOOR, NEW ZUNJARRO BLDG, ABOVE DECCAN TAYLOR, ZUNJARRO MARKET, NEAR ANANT HALWAI, KALYAN(W), 421301, DISTT. THANE, MAHARASHTRA</td>
    </tr>
    <tr>
        <td>81</td>
        <td>UPASANA EDUCATION TRUST</td>
        <td>ODISHA</td>
        <td>B-31, RUPALI SQUARE, SAHEED NAGAR, BHUBANESWAR-751007</td>
    </tr>
    <tr>
        <td>82</td>
        <td>ASMACS SKILL DEVELOPMENT LTD.</td>
        <td>ODISHA</td>
        <td>LIG-36/6, HOUSING BOARD COLONY, CHANDRASEKHARPUR, BBSR, ODISHA-751016</td>
    </tr>
    <tr>
        <td>83</td>
        <td>PRABHODITA SERVICES INDIA PVT. LTD.</td>
        <td>ODISHA</td>
        <td>530, ELLEN HOUSE, NAGESWAR TANGI, BHUBANESWAR, ODISHA, 751002</td>
    </tr>
    <tr>
        <td>84</td>
        <td>ASMACS SYSTEM SOLUTIONS PVT LTD</td>
        <td>ODISHA</td>
        <td>ASMACS ITC, AT/PO-NISCHINTAKOILI, CUTTACK, ODISHA, 754207</td>
    </tr>
    <tr>
        <td>85</td>
        <td>VERONICS CONSULTANCY PRIVATE LIMITED</td>
        <td>ODISHA</td>
        <td>AT- PLOT NO 231/992,PANIPOILA, PO-BALUGAON, DIST-NAYAGARH,PIN-752070 ODISHA.</td>
    </tr>
    <tr>
        <td>86</td>
        <td>VERONICS CONSULTANCY PRIVATE LIMITED</td>
        <td>ODISHA</td>
        <td>AMALAVATA,J.K PUR, RAYAGADA,ODISHA.</td>
    </tr>
    <tr>
        <td>87</td>
        <td>BALRAM PANDA TRUST</td>
        <td>ODISHA</td>
        <td>PLOT NO.-HIG-150, K-6, KALINGA VIHAR, BHUBNESHWAR, VILLAGE NAYAPALLI, KHORDA,ODISHA</td>
    </tr>
    <tr>
        <td>88</td>
        <td>BLACK PANTHER GUARDS &amp; SERVICES PVT.LTD.</td>
        <td> ODISHA </td>
        <td> TRAINING CENTER IN ODISHA</td>
    </tr>
    <tr>
        <td>89</td>
        <td>GRAM TARANG EMPLOYBILITY TRAINING SERVICES PVT.LTD.</td>
        <td>ODISHA</td>
        <td>17, FOREST PARLE, BHUBNESHWAR, ODISHA-751009</td>
    </tr>
    <tr>
        <td>90</td>
        <td>GRAM TARANG EMPLOYBILITY TRAINING SERVICES PVT.LTD.</td>
        <td>ODISHA</td>
        <td>TC: CENTRUION UNIVERSITY CAMPUS, RAMACHANDRAPUR JATNI, BHUBNESHWAR, ODISHA-752050</td>
    </tr>
    <tr>
        <td>91</td>
        <td>DORIC MALTIMEDIA PRIVATE LIMITED</td>
        <td>PUNJAB</td>
        <td>PB-2094/1 AMBEDKAR NAGAR, ST. NO-1, CMC CHOWK, LUDHIANA, PANJAB</td>
    </tr>
    <tr>
        <td>92</td>
        <td>CHITKARA UNIVERSITY</td>
        <td>PUNJAB</td>
        <td>CHANDIGARH- PATIALA NATIONAL HIGHWAY, RAJPURA, PUNJAB-140401</td>
    </tr>
    <tr>
        <td>93</td>
        <td>SHAHEED BHAGAT SINGH SOCIAL WELFARE TRUST</td>
        <td>PUNJAB</td>
        <td>BUILDING NO-124/4,GAUSHALA ROAD,RAMAN MANDI,DISTRICT-BATHINDA,PUNJAB,151301</td>
    </tr>
    <tr>
        <td>94</td>
        <td>KALEKE LIVETECH SERVICES PRIVATE LIMITED</td>
        <td>PUNJAB</td>
        <td>LIFE LINE INSTITUE, SITUATED IN PLOT NO 156, KHASHRA NO 79//18 MIN(4-0) AT VPO GILL KALAN, TEHSILE RAMPURA PHUL, DISTRICT BATHINDA, PUNJAB - 151103.</td>
    </tr>
    <tr>
        <td>95</td>
        <td>BABA BAHAL DASS EDUCATION &amp; VOCATIONAL TRAINING SOCIETY</td>
        <td>PUNJAB</td>
        <td>NEAR NEHRU GATE, OLD CINEMA ROAD, SARDULGARH. TEHSIL SARDULGARH , DISTR. MANSA , PUNJAB , PIN CODE 151507</td>
    </tr>
    <tr>
        <td>96</td>
        <td>TECHNEXT GLOBAL EDUCATION PVT LTD</td>
        <td>PUNJAB</td>
        <td>Z1 02418, MANDI NO.2, ST. NO.6. ABOHAR</td>
    </tr>
    <tr>
        <td>97</td>
        <td>GURU TEG BAHADUR CHARITABLE HEALTH AND EDUCATION AWARENESS SOCIETY</td>
        <td>PUNJAB</td>
        <td>KALGIDHAR KANYA PATH SHALA , PUL BAZAR ,ROPAR</td>
    </tr>
    <tr>
        <td>98</td>
        <td>LORD GANESHA INSTITUTE OF MANAGEMENT AND TECHNOLOGY</td>
        <td>PUNJAB</td>
        <td>PLOT NO.37, NETAJI NAGAR, ANAND PURI COLONY, LUDHIANA</td>
    </tr>
    <tr>
        <td>99</td>
        <td>TECHNEXT GLOBAL EDUCATION PVT LTD</td>
        <td>PUNJAB</td>
        <td>KHASRA NO. 406/1, KISHANPURA ROAD, MUKAND NAGAR, SANGRUR</td>
    </tr>
    <tr>
        <td>100</td>
        <td>TECHNEXT GLOBAL EDUCATION PVT LTD</td>
        <td>PUNJAB</td>
        <td>#613, AMRIK SINGH ROAD, BATHINDA</td>
    </tr>
    <tr>
        <td>101</td>
        <td>LORD GANESHA INSTITUTE OF MANAGEMENT AND TECHNOLOGY</td>
        <td>PUNJAB</td>
        <td>KHASRA NO. 50/19/2/4, RAILWAY ROAD, LEHRA GAGA, SANGRUR</td>
    </tr>
    <tr>
        <td>102</td>
        <td>SARASWATI KNOWLEDGE PARK</td>
        <td>PUNJAB</td>
        <td>KHASRA NO-776/01,NEAR BUS STAND,OLD BUILDING,M.S MAAN MEMORIAL GIRLS COLLEGE,NATHANA,DISTRICT-BATHINDA,151102</td>
    </tr>
    <tr>
        <td>103</td>
        <td>BALAJI PRIVATE INDUSTRIAL TRAINING INSTITUTE</td>
        <td>RAJASTHAN</td>
        <td>MOONPUR ( MUNDAWAR)-ALWAR RAJASTHAN</td>
    </tr>
    <tr>
        <td>104</td>
        <td>SANSKAR EDUCATION HUB</td>
        <td>RAJASTHAN</td>
        <td>66, SHRI RAM NAGAR-B, KHIRANI PHATAK ROAD, JHOTWARA JAIPUR RAJASTHAN</td>
    </tr>
    <tr>
        <td>105</td>
        <td>SANSKAR EDUCATION HUB</td>
        <td>RAJASTHAN</td>
        <td>PLOT NO 21,SHIV MARKET, PAKKA BANDA, RINGS ROAD, CHOMU JAIPUR RAJASTHAN - 303702</td>
    </tr>
    <tr>
        <td>106</td>
        <td>SANSKAR EDUCATION HUB</td>
        <td>RAJASTHAN</td>
        <td>66, SHRI RAM NAGAR-B, KHIRANI PHATAK ROAD, JHOTWARA JAIPUR RAJASTHAN</td>
    </tr>
    <tr>
        <td>107</td>
        <td>ASHIRVAD PLUMBING SCHOOL</td>
        <td>RAJASTHAN</td>
        <td>ASHIRVAD PLUMBING SCHOOL - BHIWADI, SP1-177 &amp; 178, KAHRANI INDUSTRIAL AREA, BHIWADI EXTENSION, BHIWADI, ALWAR, RAJASTHAN - 301019</td>
    </tr>
    <tr>
        <td>108</td>
        <td>SOLAR INSTITUTE OF TECHNOLOGY TRUST</td>
        <td>TAMIL NADU</td>
        <td>25H, KADAMBUR ROAD ,KAYATHAR</td>
    </tr>
    <tr>
        <td>109</td>
        <td>SRI ASTRO TRAINING SERVICES PVT LTD</td>
        <td>TAMIL NADU</td>
        <td>280/2 EKKALMEDU VILLAGE PUDHUVOYAL GUMMIDIPOONDI TALUK THIRUVALLUR DISTRICT</td>
    </tr>
    <tr>
        <td>110</td>
        <td>SRI RAMAKRISHNA ADVANCED TRAINING INSTITUTE (SRATI)</td>
        <td>TAMILNADU</td>
        <td>395, SAROJINI NAIDU STREET, SIDHAPUDUR, COIMBATORE 44</td>
    </tr>
    <tr>
        <td>111</td>
        <td>SRI ASTRO SERVICES PVT. LTD.</td>
        <td>TAMILNADU</td>
        <td>5/6 SELVAN NAGAR, PONNIYAMAM MEDU 200FEET INNER RING ROAD, CHENNAI-600110(TN)</td>
    </tr>
    <tr>
        <td>112</td>
        <td>ANNAI EDUCATIONAL TRUST</td>
        <td>TAMILNADU</td>
        <td>NO.D/10, 10TH CROSS STREET , SATHUVACHAIN VELLORE-632009,TAMILNADU</td>
    </tr>
    <tr>
        <td>113</td>
        <td>AMITY UNIVERSITY</td>
        <td>UTTAR PRADESH</td>
        <td>SECTOR-125, NOIDA-201313 UP</td>
    </tr>
    <tr>
        <td>114</td>
        <td>JAHANGIRABAD EDUCATIONAL TRUST GROUP OF INSTITUTIONS FACULTY OF SKILL DEVELOPMENT &amp; INNOVATION(JETGI)</td>
        <td>UTTAR PRADESH</td>
        <td>D-19, ABUHFAZAL  NAGAR  ENCLAVE, PART-1, JAMIA NAGAR, OKHLKA, DELHI-110025 CORP.OFFICE: SHREEPUSHUPATI TOWER ,CP-18, CHINHAT CHAURAHA, NEAR CHANDAN HOSPITAL, FAIZABAD ROAD, VIJANENT KHAND GOMTI NAGAR, LUCKNOW-226010(U.P.)</td>
    </tr>
    <tr>
        <td>115</td>
        <td>SHARDA VOCATIONAL TRAINING INSTITUTE</td>
        <td>UTTAR PRADESH</td>
        <td>PLOT NO-497,NOORPUR,FARRUKHABAD</td>
    </tr>
    <tr>
        <td>116</td>
        <td>WORLD ASSOCIATION FOR SMALL AND MEDIUM ENTERPRISES</td>
        <td>UTTAR PRADESH</td>
        <td>WASME HOUSE, PLOT NO.4, INSTITUTIONAL AREA, SECTOR-16A, FILM CITY, NOIDA-201301, U.P.</td>
    </tr>
    <tr>
        <td>117</td>
        <td>GRAMIN KISAN VIKAS SOCIETY </td>
        <td>UTTRAKHAND</td>
        <td> VILLAGE SHIVNAGAR, P.O. BHIGUN VIA GHANSALI, TEHRI GARHWAL, UTTRAKHAND</td>
    </tr>
    <tr>
        <td>118</td>
        <td>QUIVAN SKILL EMPOWERMENT PVT. ZLTD.</td>
        <td>WEST BENGAL</td>
        <td>&quot;N.N.SAMADDAR ROAD, TALBANDA, PO:JUGBERIA PS: NEW BARRACKPORE, KOLKATA-700110, WEST BENGAL, INDIA.&quot; </td>
    </tr>
   
    <tr>
        <td>119</td>
        <td>SALTLAKE INSTITUTE OF ENGINEERING AND MANAGEMENT LIMITED</td>
        <td>WEST BENGAL</td>
        <td>ASHRAM, GN-34/2, SALT LAKE ELECTRONICS COMPLEX, SEC-V, KOLKATA-700091</td>
    </tr>
    <tr>
        <td>120</td>
        <td>ARAMBAGH RURAL DEVELOPMENT INSTITUTION</td>
        <td>WEST BENGAL</td>
        <td>WARD NO.5, LINK ROAD, P.O &amp; P.S- ARAMBAGH, DIST. HOOGHLY, WEST BENGAL-712601</td>
    </tr>
    <tr>
        <td>121</td>
        <td>BRAINLITE EDUCATION SOLUTIONS PVT LTD</td>
        <td>WEST BENGAL</td>
        <td>&quot;HOPE, ST PAULS RD, PRIMARY, DURGAPUR, A ZONE , PASCHIM BARDHAMAN&quot;</td>
    </tr>
  
    <tr>
        <td>122</td>
        <td>KALPANA EDUCATION TRUST</td>
        <td>WEST BENGAL</td>
        <td>RATHTALA P.O. KANCHANAGAR, PURBA, BARDHMAN-713102</td>
    </tr>
		
	</tbody>		
</table>
			
			
							
							
							





						</div>

						

						<br>

					

					</div>

				</div>

				

				

			</div>

		</div>

	</section>

    <!--Newsleter Section-->

    <?php include "includes/newsletter.php"; ?>

    <!--End Newsleter Section-->

<?php include "includes/footer.php"; ?>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



  <script>

  $(document).ready(function() {

    $('#example').DataTable();

    $('.loading').hide();

});



</script>

</body>

</html>

