const destinosInternacionales = [
    // Albania
    'Tirana (TIA)',
    
    // Alemania
    'Fráncfort (FRA)', 'Múnich (MUC)', 'Berlín (BER)', 'Düsseldorf (DUS)', 
    
    // Andorra
    'Barcelona (BCN)',  // Usa aeropuertos vecinos (España/Francia)
    
    // Armenia
    'Ereván (EVN)',
    
    // Austria
    'Viena (VIE)', 'Salzburgo (SZG)',
    
    // Azerbaiyán
    'Bakú (GYD)',
    
    // Bélgica
    'Bruselas (BRU)', 'Amberes (ANR)',
    
    // Bielorrusia
    'Minsk (MSQ)',
    
    // Bosnia y Herzegovina
    'Sarajevo (SJJ)', 'Banja Luka (BNX)',
    
    // Bulgaria
    'Sofía (SOF)', 'Burgas (BOJ)', 'Varna (VAR)',
    
    // Chipre
    'Nicosia (LCA)', 'Pafos (PFO)',
    
    // Croacia
    'Zagreb (ZAG)', 'Dubrovnik (DBV)', 'Split (SPU)',
    
    // Dinamarca
    'Copenhague (CPH)', 'Billund (BLL)',
    
    // Eslovaquia
    'Bratislava (BTS)',
    
    // Eslovenia
    'Liubliana (LJU)',
    
    // España
    'Madrid (MAD)', 'Barcelona (BCN)', 'Palma de Mallorca (PMI)', 'Málaga (AGP)',
    
    // Estonia
    'Tallin (TLL)',
    
    // Finlandia
    'Helsinki (HEL)', 'Rovaniemi (RVN)',
    
    // Francia
    'París (CDG)', 'Niza (NCE)', 'Lyon (LYS)', 'Marsella (MRS)',
    
    // Georgia
    'Tiflis (TBS)',
    
    // Grecia
    'Atenas (ATH)', 'Thessalonica (SKG)', 'Heraclión (HER)',
    
    // Hungría
    'Budapest (BUD)',
    
    // Irlanda
    'Dublín (DUB)', 'Shannon (SNN)',
    
    // Islandia
    'Reikiavik (KEF)',
    
    // Italia
    'Roma (FCO)', 'Milán (MXP)', 'Venecia (VCE)', 'Nápoles (NAP)',
    
    // Kazajistán
    'Nursultán (NQZ)',  // Principal en parte europea
    
    // Letonia
    'Riga (RIX)',
    
    // Liechtenstein
    'Zúrich (ZRH)',  // Usa aeropuertos suizos
    
    // Lituania
    'Vilna (VNO)', 'Kaunas (KUN)',
    
    // Luxemburgo
    'Luxemburgo (LUX)',
    
    // Macedonia del Norte
    'Skopie (SKP)',
    
    // Malta
    'La Valeta (MLA)',
    
    // Moldavia
    'Chisináu (KIV)',
    
    // Mónaco
    'Niza (NCE)',  // Usa aeropuertos franceses
    
    // Montenegro
    'Podgorica (TGD)', 'Tivat (TIV)',
    
    // Noruega
    'Oslo (OSL)', 'Bergen (BGO)', 'Tromsø (TOS)',
    
    // Países Bajos
    'Ámsterdam (AMS)', 'Rotterdam (RTM)',
    
    // Polonia
    'Varsovia (WAW)', 'Cracovia (KRK)', 'Gdansk (GDN)',
    
    // Portugal
    'Lisboa (LIS)', 'Oporto (OPO)', 'Faro (FAO)',
    
    // Reino Unido
    'Londres (LHR)', 'Manchester (MAN)', 'Edimburgo (EDI)',
    
    // República Checa
    'Praga (PRG)', 'Brno (BRQ)',
    
    // Rumanía
    'Bucarest (OTP)', 'Cluj-Napoca (CLJ)',
    
    // Rusia
    'Moscú (SVO)', 'San Petersburgo (LED)', 'Sochi (AER)',
    
    // San Marino
    'Bolonia (BLQ)',  // Usa aeropuertos italianos
    
    // Serbia
    'Belgrado (BEG)', 'Niš (INI)',
    
    // Suecia
    'Estocolmo (ARN)', 'Gotemburgo (GOT)', 'Malmö (MMX)',
    
    // Suiza
    'Zúrich (ZRH)', 'Ginebra (GVA)', 'Basilea (BSL)',
    
    // Turquía
    'Estambul (IST)', 'Ankara (ESB)', 'Esmirna (ADB)',
    
    // Ucrania
    'Kiev (KBP)', 'Leópolis (LWO)',
    
    // Vaticano
    'Roma (FCO)' ,

    // Afganistán
    'Kabul (KBL)', 'Kandahar (KDH)', 'Herat (HEA)',
    
    // Arabia Saudita
    'Riad (RUH)', 'Yeda (JED)', 'Dammam (DMM)', 'Medina (MED)',
    
    // Armenia*
    'Ereván (EVN)', 'Gyumri (LWN)',
    
    // Azerbaiyán*
    'Bakú (GYD)', 'Ganja (KVD)', 'Najicheván (NAJ)',
    
    // Bahréin
    'Manama (BAH)',
    
    // Bangladés
    'Daca (DAC)', 'Chittagong (CGP)', 'Sylhet (ZYL)',
    
    // Birmania (Myanmar)
    'Yangón (RGN)', 'Mandalay (MDL)', 'Naypyidaw (NYT)',
    
    // Brunéi
    'Bandar Seri Begawan (BWN)',
    
    // Bután
    'Paro (PBH)', 
    
    // Camboya
    'Phnom Penh (PNH)', 'Siem Reap (REP)', 'Sihanoukville (KOS)',
    
    // Catar
    'Doha (DOH)',
    
    // China
    'Pekín-Capital (PEK)', 'Shanghái-Pudong (PVG)', 'Cantón (CAN)', 
    'Hong Kong (HKG)', 'Chengdu (CTU)', 'Shenzhen (SZX)', 
    'Chongqing (CKG)', 'Xi\'an (XIY)', 'Hangzhou (HGH)', 
    'Taiwán-Taoyuán (TPE)', 'Taiwán-Taichung (RMQ)',
    
    // Chipre*
    'Lárnaca (LCA)', 'Pafos (PFO)', 'Nicosia (NIC)',
    
    // Corea del Norte
    'Pyongyang (FNJ)', 
    
    // Corea del Sur
    'Seúl-Incheon (ICN)', 'Seúl-Gimpo (GMP)', 'Busan (PUS)', 
    'Jeju (CJU)', 'Daegu (TAE)',
    
    // Emiratos Árabes Unidos
    'Dubái (DXB)', 'Abu Dabi (AUH)', 'Sharjah (SHJ)', 'Ras al-Khaimah (RKT)',
    
    // Filipinas
    'Manila (MNL)', 'Cebú (CEB)', 'Clark (CRK)', 'Dávao (DVO)',
    
    // Georgia*
    'Tiflis (TBS)', 'Batumi (BUS)', 'Kutaisi (KUT)',
    
    // India
    'Delhi (DEL)', 'Bombay (BOM)', 'Bangalore (BLR)', 
    'Hyderabad (HYD)', 'Chennai (MAA)', 'Kolkata (CCU)',
    
    // Indonesia
    'Yakarta (CGK)', 'Denpasar-Bali (DPS)', 'Surabaya (SUB)', 
    'Makassar (UPG)', 'Medan (KNO)',
    
    // Irak
    'Bagdad (BGW)', 'Basora (BSR)', 'Erbil (EBL)', 'Najaf (NJF)',
    
    // Irán
    'Teherán-Imam Jomeini (IKA)', 'Mashhad (MHD)', 'Shiraz (SYZ)', 'Isfahán (IFN)',
    
    // Israel
    'Tel Aviv (TLV)', 'Eilat (ETH)', 
    
    // Japón
    'Tokio-Haneda (HND)', 'Tokio-Narita (NRT)', 'Osaka-Kansai (KIX)', 
    'Nagoya-Centrair (NGO)', 'Fukuoka (FUK)', 'Sapporo (CTS)',
    
    // Jordania
    'Amman (AMM)', 'Aqaba (AQJ)',
    
    // Kazajistán*
    'Almatý (ALA)', 'Astana (NQZ)', 'Aktau (SCO)', 
    
    // Kirguistán
    'Biskek (FRU)', 'Osh (OSS)',
    
    // Kuwait
    'Kuwait City (KWI)',
    
    // Laos
    'Vientián (VTE)', 'Luang Prabang (LPQ)', 
    
    // Líbano
    'Beirut (BEY)', 
    
    // Malasia
    'Kuala Lumpur (KUL)', 'Kota Kinabalu (BKI)', 'Penang (PEN)', 'Kuching (KCH)',
    
    // Maldivas
    'Malé (MLE)', 'Gan (GAN)', 'Hanimaadhoo (HAQ)',
    
    // Mongolia
    'Ulán Bator (ULN)', 
    
    // Nepal
    'Katmandú (KTM)', 'Pokhara (PKR)', 'Lukla (LUA)',
    
    // Omán
    'Mascate (MCT)', 'Salalah (SLL)',
    
    // Pakistán
    'Karachi (KHI)', 'Lahore (LHE)', 'Islamabad (ISB)',
    
    // Palestina**
    'Belén (Gush Dan) - Usan aeropuertos de Israel/Jordania*',
    
    // Rusia* (parte asiática)
    'Moscú-Sheremétievo (SVO)', 'San Petersburgo (LED)', 'Novosibirsk (OVB)', 
    'Vladivostok (VVO)', 'Ekaterimburgo (SVX)',
    
    // Singapur
    'Singapur-Changi (SIN)',
    
    // Siria
    'Damasco (DAM)', 'Alepo (ALP)', 
    
    // Sri Lanka
    'Colombo (CMB)', 'Mattala (HRI)', 
    
    // Tailandia
    'Bangkok-Suvarnabhumi (BKK)', 'Chiang Mai (CNX)', 'Phuket (HKT)', 'Krabi (KBV)',
    
    // Tayikistán
    'Dusambé (DYU)', 'Khudzhand (LBD)',
    
    // Timor Oriental
    'Dili (DIL)', 'Baucau (BCH)',
    
    // Turquía* (parte asiática)
    'Estambul (IST)', 'Ankara (ESB)', 'Antalya (AYT)', 'Esmirna (ADB)',
    
    // Turkmenistán
    'Asjabad (ASB)', 'Turkmenbashi (KRW)', 'Mary (MYP)',
    
    // Uzbekistán
    'Taskent (TAS)', 'Samarcanda (SKD)', 'Bujará (BHK)',
    
    // Vietnam
    'Hanói (HAN)', 'Ciudad Ho Chi Minh (SGN)', 'Da Nang (DAD)', 'Nha Trang (CXR)',
    
    // Yemen
    'Saná (SAH)', 'Adén (ADE)', 'Socotra (SCT)',
    // Angola
    'Luanda-Quatro de Fevereiro (LAD)', 'Benguela (BUG)', 'Lubango-Mukanka (SDD)',
    
    // Argelia
    'Argel-Houari Boumediene (ALG)', 'Orán-Es Sénia (ORN)', 'Constantina-Mohamed Boudiaf (CZL)',
    
    // Benín
    'Cotonú-Cadjehoun (COO)', 
    
    // Botsuana
    'Gaborone-Sir Seretse Khama (GBE)', 'Maun (MUB)', 'Kasane (BBK)',
    
    // Burkina Faso
    'Uagadugú (OUA)', 'Bobo-Dioulasso (BOY)', 
    
    // Burundi
    'Buyumbura (BJM)', 
    
    // Cabo Verde
    'Sal-Aristides Pereira (SID)', 'Santiago-Praia (RAI)', 'Boa Vista (BVC)',
    
    // Camerún
    'Duala (DLA)', 'Yaundé-Nsimalen (NSI)', 'Garoua (GOU)',
    
    // Chad
    'Yamena (NDJ)', 'Abéché (AEH)', 
    
    // Comoras
    'Moroni-Príncipe Said Ibrahim (HAH)', 
    
    // Congo (República del Congo)
    'Brazzaville (BZV)', 'Pointe-Noire (PNR)', 
    
    // Costa de Marfil
    'Abiyán-Port Bouet (ABJ)', 'Bouaké (BYK)', 
    
    // Egipto
    'El Cairo (CAI)', 'Hurghada (HRG)', 'Sharm El Sheikh (SSH)', 'Luxor (LXR)',
    
    // Eritrea
    'Asmara (ASM)', 
    
    // Esuatini (Suazilandia)
    'Manzini-Sikhuphe (SHO)',  // Usa aeropuerto propio desde 2014
    
    // Etiopía
    'Addis Abeba-Bole (ADD)', 'Dire Dawa (DIR)', 
    
    // Gabón
    'Libreville-Leon M’ba (LBV)', 'Port-Gentil (POG)', 
    
    // Gambia
    'Banjul-Yundum (BJL)', 
    
    // Ghana
    'Accra-Kotoka (ACC)', 'Kumasi (KMS)', 
    
    // Guinea
    'Conakri (CKY)', 
    
    // Guinea-Bisáu
    'Bisáu-Osvaldo Vieira (OXB)', 
    
    // Guinea Ecuatorial
    'Malabo (SSG)', 'Bata (BSG)', 
    
    // Kenia
    'Nairobi-Jomo Kenyatta (NBO)', 'Mombasa-Moi (MBA)', 
    
    // Lesoto
    'Maseru-Moshoeshoe I (MSU)', 
    
    // Liberia
    'Monrovia-Roberts (ROB)', 
    
    // Libia
    'Trípoli-Mitiga (MJI)', 'Benina-Benghazi (BEN)', 
    
    // Madagascar
    'Antananarivo-Ivato (TNR)', 'Nosy Be-Fascene (NOS)', 
    
    // Malaui
    'Lilongüe-Kamuzu (LLW)', 'Blantyre-Chileka (BLZ)', 
    
    // Malí
    'Bamako-Sénou (BKO)', 
    
    // Marruecos
    'Casablanca-Mohammed V (CMN)', 'Marrakech-Menara (RAK)', 'Tánger-Ibn Batouta (TNG)', 'Agadir-Al Massira (AGA)',
    
    // Mauricio
    'Port Louis-Sir Seewoosagur Ramgoolam (MRU)', 
    
    // Mauritania
    'Nuakchot (NKC)', 'Nouadhibou (NDB)', 
    
    // Mozambique
    'Maputo (MPM)', 'Beira (BEW)', 'Vilanculos (VNX)', 
    
    // Namibia
    'Windhoek-Hosea Kutako (WDH)', 'Walvis Bay (WVB)', 
    
    // Níger
    'Niamey-Diori Hamani (NIM)', 
    
    // Nigeria
    'Lagos-Murtala Muhammed (LOS)', 'Abuja-Nnamdi Azikiwe (ABV)', 'Port Harcourt (PHC)', 'Kano-Mallam Aminu (KAN)',
    
    // República Centroafricana
    'Bangui-M’Poko (BGF)', 
    
    // República Democrática del Congo
    'Kinshasa-Ndjili (FIH)', 'Lubumbashi (FBM)', 
    
    // Ruanda
    'Kigali (KGL)', 
    
    // Santo Tomé y Príncipe
    'Santo Tomé (TMS)', 
    
    // Senegal
    'Dakar-Blaise Diagne (DSS)', 
    
    // Seychelles
    'Mahé (SEZ)', 
    
    // Sierra Leona
    'Freetown-Lungi (FNA)', 
    
    // Somalia
    'Mogadiscio-Aden Adde (MGQ)', 
    
    // Sudáfrica
    'Johannesburgo-O.R. Tambo (JNB)', 'Ciudad del Cabo (CPT)', 'Durban-King Shaka (DUR)',
    
    // Sudán
    'Jartum (KRT)', 
    
    // Sudán del Sur
    'Yuba (JUB)', 
    
    // Tanzania
    'Dar es Salaam-Julius Nyerere (DAR)', 'Kilimanjaro (JRO)', 'Zanzíbar (ZNZ)', 
    
    // Togo
    'Lomé-Tokoin (LFW)', 
    
    // Túnez
    'Túnez-Cartago (TUN)', 'Yerba-Djerba (DJE)', 
    
    // Uganda
    'Entebbe (EBB)', 
    
    // Yibuti
    'Yibuti-Ambouli (JIB)', 
    
    // Zambia
    'Lusaka (LUN)', 'Livingstone (LVI)', 
    
    // Zimbabue
    'Harare (HRE)', 'Victoria Falls (VFA)',
    // Australia
    'Sídney (SYD)', 'Melbourne (MEL)', 'Brisbane (BNE)', 
    'Perth (PER)', 'Adelaida (ADL)', 'Darwin (DRW)', 
    'Cairns (CNS)', 'Gold Coast (OOL)', 'Hobart (HBA)',
    
    // Fiyi
    'Nadi (NAN)', 'Suva (SUV)',
    
    // Islas Marshall
    'Majuro (MAJ)', 'Kwajalein (KWA)',
    
    // Islas Salomón
    'Honiara (HIR)', 'Munda (MUA)',
    
    // Kiribati
    'Tarawa (TRW)', 'Kiritimati (CXI)',
    
    // Micronesia
    'Pohnpei (PNI)', 'Chuuk (TKK)', 'Yap (YAP)', 'Kosrae (KSA)',
    
    // Nauru
    'Nauru (INU)',
    
    // Nueva Zelanda
    'Auckland (AKL)', 'Wellington (WLG)', 'Christchurch (CHC)', 
    'Queenstown (ZQN)', 'Rotorua (ROT)',
    
    // Palaos
    'Koror (ROR)',
    
    // Papúa Nueva Guinea
    'Puerto Moresby (POM)', 'Lae (LAE)', 'Madang (MAG)', 
    'Mount Hagen (HGU)', 'Rabaul (RAB)',
    
    // Samoa
    'Apia-Faleolo (APW)', 'Maota (MXS)',
    
    // Tonga
    "Tongatapu-Fua'amotu (TBU)", "Vava'u (VAV)",
    
    // Tuvalu
    'Funafuti (FUN)',
    
    // Vanuatu
    'Port Vila (VLI)', 'Espiritu Santo (SON)',
    
    // Timor Oriental*
    'Dili (DIL)',
    
    // Nueva Guinea Occidental (Indonesia)
    'Jayapura-Sentani (DJJ)', 'Manokuri (MKW)', 'Biak (BIK)', 'Sorong (SOQ)',

    'Biskek (FRU)', 

// Palestina (aunque usa aeropuertos vecinos, tiene uno propio)
'Belén (JRS)',  // Aeropuerto de Jerusalén (disputado)

// Tayikistán (faltante)
'Dusambé (DYU)', 

// Turkmenistán (faltante)
'Asjabad (ASB)', 

'El Aaiún (EUN)', 
// Kosovo (Europa)
    'Pristina (PRN)',
    
    // Kirguistán (Asia)
    'Biskek (FRU)',
    
    // Palestina (Asia)
    'Belén (JRS)',
    
    // Tayikistán (Asia)
    'Dusambé (DYU)',
    
    // Turkmenistán (Asia)
    'Asjabad (ASB)',
    
    // Sahara Occidental (África)
    'El Aaiún (EUN)',
    // Albania
'Vlorë (IAO)',

// Alemania
'Hamburgo (HAM)', 'Colonia/Bonn (CGN)', 'Leipzig (LEJ)', 'Hanover (HAJ)', 

// Austria
'Innsbruck (INN)', 'Graz (GRZ)', 

// Bélgica
'Charleroi (CRL)', 'Lieja (LGG)', 

// Bulgaria
'Plovdiv (PDV)', 

// Croacia
'Zadar (ZAD)', 'Pula (PUY)', 

// Dinamarca
'Aalborg (AAL)', 'Aarhus (AAR)', 

// Eslovaquia
'Košice (KSC)', 

// España
'Alicante (ALC)', 'Sevilla (SVQ)', 'Valencia (VLC)', 'Ibiza (IBZ)', 'Bilbao (BIO)', 'Santiago (SCQ)', 

// Finlandia
'Turku (TKU)', 'Tampere (TMP)', 

// Francia
'Burdeos (BOD)', 'Toulouse (TLS)', 'Estrasburgo (SXB)', 'Nantes (NTE)', 

// Grecia
'Rodas (RHO)', 'Corfú (CFU)', 'Santorini (JTR)', 

// Hungría
'Debrecen (DEB)', 

// Irlanda
'Cork (ORK)', 'Knock (NOC)', 

// Italia
'Bérgamo (BGY)', 'Bolonia (BLQ)', 'Florencia (FLR)', 'Bari (BRI)', 'Palermo (PMO)', 'Catania (CTA)', 

// Noruega
'Stavanger (SVG)', 'Trondheim (TRD)', 

// Polonia
'Wroclaw (WRO)', 'Poznan (POZ)', 

// Portugal
'Faro (FAO)', 'Madeira (FNC)', 

// Reino Unido
'Londres-Gatwick (LGW)', 'Londres-Stansted (STN)', 'Birmingham (BHX)', 'Glasgow (GLA)', 'Bristol (BRS)', 

// República Checa
'Ostrava (OSR)', 

// Rumanía
'Timisoara (TSR)', 

// Suecia
'Umeå (UME)', 'Luleå (LLA)', 

// Suiza
'Berna (BRN)', 

// Ucrania
'Odesa (ODS)', 'Járkov (HRK)',
// Arabia Saudita
'Abha (AHB)', 'Taif (TIF)', 

// Bangladesh
'Cox s Bazar (CXB)', 

// Camboya
'Battambang (BBM)', 

// China
'Shenyang (SHE)', 'Harbin (HRB)', 'Nankín (NKG)', 'Wuhan (WUH)', 'Qingdao (TAO)', 

// Corea del Sur
'Incheon (ICN)', 'Jeju (CJU)', 

// Emiratos Árabes Unidos
'Fujairah (FJR)', 

// Filipinas
'Kalibo (KLO)', 'Cebú-Mactán (CEB)', 

// India
'Ahmedabad (AMD)', 'Pune (PNQ)', 'Goa (GOI)', 'Kolkata (CCU)', 

// Indonesia
'Makassar (UPG)', 'Lombok (LOP)', 

// Irán
'Tabriz (TBZ)', 'Kish (KIH)', 

// Israel
'Haifa (HFA)', 

// Japón
'Fukuoka (FUK)', 'Sapporo (CTS)', 'Nagoya (NGO)', 

// Jordania
'Rey de Hussein (OMF)', 

// Kazajistán
'Aktobe (AKX)', 

// Laos
'Pakse (PKZ)', 

// Malasia
'Langkawi (LGK)', 'Kuching (KCH)', 

// Mongolia
'Dalanzadgad (DLZ)', 

// Nepal
'Bharatpur (BHR)', 

// Omán
'Sohar (OHS)', 

// Pakistán
'Faisalabad (LYP)', 

// Rusia (Asia)
'Irkutsk (IKT)', 'Krasnoyarsk (KJA)', 

// Tailandia
'Chiang Rai (CEI)', 

// Uzbekistán
'Urgench (UGC)', 

// Vietnam
'Hué (HUI)', 'Haiphong (HPH)',
// Argelia
'Annaba (AAE)', 'Oran (ORN)', 

// Botsuana
'Kasane (BBK)', 

// Egipto
'Asuán (ASW)', 

// Etiopía
'Lalibela (LLI)', 

// Ghana
'Tamale (TML)', 

// Kenia
'Kisumu (KIS)', 

// Madagascar
'Toliara (TLE)', 

// Marruecos
'Fez (FEZ)', 'Rabat (RBA)', 'Oujda (OUD)', 

// Mozambique
'Nampula (APL)', 

// Namibia
'Walvis Bay (WVB)', 

// Nigeria
'Kano (KAN)', 'Port Harcourt (PHC)', 

// Seychelles
'Praslin (PRI)', 

// Sudáfrica
'East London (ELS)', 'Bloemfontein (BFN)', 

// Tanzania
'Mwanza (MWZ)', 

// Túnez
'Monastir (MIR)', 

// Uganda
'Gulu (ULU)', 

// Zambia
'Ndola (NLA)',
// Australia
'Canberra (CBR)', 'Townsville (TSV)', 'Broome (BME)', 'Launceston (LST)', 

// Fiyi
'Lautoka (LTK)', 

// Nueva Zelanda
'Palmerston North (PMR)', 'Invercargill (IVC)', 

// Papúa Nueva Guinea
'Goroka (GKA)', 'Hoskins (HKN)', 

// Islas Salomón
'Gizo (GZO)', 

// Samoa Americana
'Pago Pago (PPG)', 

// Polinesia Francesa
'Papeete (PPT)', 'Bora Bora (BOB)'
];