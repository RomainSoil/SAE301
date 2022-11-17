--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.10
-- Dumped by pg_dump version 14.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

--
-- Name: alimentation; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.alimentation (
    date timestamp without time zone NOT NULL,
    ajeun boolean NOT NULL,
    surveillancehydratation boolean NOT NULL,
    surveillancealimentation boolean NOT NULL,
    regime boolean NOT NULL,
    aideaurepas boolean NOT NULL,
    idpatient integer NOT NULL
);


ALTER TABLE public.alimentation OWNER TO iutinfo134;

--
-- Name: cardio; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.cardio (
    date timestamp without time zone NOT NULL,
    ta text,
    pls integer,
    ecg text,
    idpatient integer NOT NULL
);


ALTER TABLE public.cardio OWNER TO iutinfo134;

--
-- Name: elimination; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.elimination (
    date timestamp without time zone NOT NULL,
    selles boolean NOT NULL,
    gaz boolean NOT NULL,
    urines boolean NOT NULL,
    idpatient integer NOT NULL
);


ALTER TABLE public.elimination OWNER TO iutinfo134;

--
-- Name: email; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.email (
    email text NOT NULL
);


ALTER TABLE public.email OWNER TO iutinfo134;

--
-- Name: etudiant; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.etudiant (
    email text NOT NULL,
    mdp text NOT NULL,
    nom text,
    prenom text,
    classe text,
    annee integer,
    code text
);


ALTER TABLE public.etudiant OWNER TO iutinfo134;

--
-- Name: groupe; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.groupe (
    idgroupe integer NOT NULL,
    nomgroupe text,
    email text NOT NULL,
    admin boolean NOT NULL
);


ALTER TABLE public.groupe OWNER TO iutinfo134;

--
-- Name: groupe_idgroupe_seq; Type: SEQUENCE; Schema: public; Owner: iutinfo134
--

CREATE SEQUENCE public.groupe_idgroupe_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.groupe_idgroupe_seq OWNER TO iutinfo134;

--
-- Name: groupe_idgroupe_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iutinfo134
--

ALTER SEQUENCE public.groupe_idgroupe_seq OWNED BY public.groupe.idgroupe;


--
-- Name: hygiene; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.hygiene (
    date timestamp without time zone NOT NULL,
    toilette boolean NOT NULL,
    douche boolean NOT NULL,
    bain boolean NOT NULL,
    refectionlit boolean NOT NULL,
    change boolean NOT NULL,
    soindebouche boolean NOT NULL,
    preventiondescare boolean NOT NULL,
    changementdepos boolean NOT NULL,
    matelasaair boolean NOT NULL,
    idpatient integer NOT NULL
);


ALTER TABLE public.hygiene OWNER TO iutinfo134;

--
-- Name: intervenant; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.intervenant (
    idintervenant integer NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    date timestamp without time zone NOT NULL,
    compterendu text NOT NULL
);


ALTER TABLE public.intervenant OWNER TO iutinfo134;

--
-- Name: intervenant_idintervenant_seq; Type: SEQUENCE; Schema: public; Owner: iutinfo134
--

CREATE SEQUENCE public.intervenant_idintervenant_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.intervenant_idintervenant_seq OWNER TO iutinfo134;

--
-- Name: intervenant_idintervenant_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iutinfo134
--

ALTER SEQUENCE public.intervenant_idintervenant_seq OWNED BY public.intervenant.idintervenant;


--
-- Name: medicament; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.medicament (
    nom text NOT NULL,
    cp integer NOT NULL,
    prise text NOT NULL
);


ALTER TABLE public.medicament OWNER TO iutinfo134;

--
-- Name: message; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.message (
    id integer NOT NULL,
    email text,
    userx text,
    textmessage text,
    date date,
    idgroupe integer NOT NULL
);


ALTER TABLE public.message OWNER TO iutinfo134;

--
-- Name: message_id_seq; Type: SEQUENCE; Schema: public; Owner: iutinfo134
--

CREATE SEQUENCE public.message_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.message_id_seq OWNER TO iutinfo134;

--
-- Name: message_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iutinfo134
--

ALTER SEQUENCE public.message_id_seq OWNED BY public.message.id;


--
-- Name: miseensecurite; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.miseensecurite (
    date timestamp without time zone NOT NULL,
    barrieredelitprescrite boolean NOT NULL,
    barrieredelitconfort boolean NOT NULL,
    serveillancecontention boolean NOT NULL,
    idpatient integer NOT NULL
);


ALTER TABLE public.miseensecurite OWNER TO iutinfo134;

--
-- Name: mobilite; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.mobilite (
    date timestamp without time zone NOT NULL,
    aidealamarche boolean NOT NULL,
    aideaulever boolean NOT NULL,
    aideaucoucher boolean NOT NULL,
    aideaufauteil boolean NOT NULL,
    idpatient integer NOT NULL
);


ALTER TABLE public.mobilite OWNER TO iutinfo134;

--
-- Name: neuro; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.neuro (
    date timestamp without time zone NOT NULL,
    "t°c" double precision,
    glasgow double precision,
    eva integer,
    algoplus integer,
    idpatient integer NOT NULL
);


ALTER TABLE public.neuro OWNER TO iutinfo134;

--
-- Name: note; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.note (
    email text NOT NULL,
    idscenario integer NOT NULL,
    note integer NOT NULL
);


ALTER TABLE public.note OWNER TO iutinfo134;

--
-- Name: patient; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.patient (
    idpatient integer NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL,
    age integer NOT NULL,
    ddn date NOT NULL,
    poids integer NOT NULL,
    taille integer NOT NULL,
    iep integer NOT NULL,
    ipp integer NOT NULL,
    sexe text NOT NULL,
    adresse text NOT NULL,
    ville text NOT NULL,
    codepostal integer NOT NULL
);


ALTER TABLE public.patient OWNER TO iutinfo134;

--
-- Name: patient_idpatient_seq; Type: SEQUENCE; Schema: public; Owner: iutinfo134
--

CREATE SEQUENCE public.patient_idpatient_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.patient_idpatient_seq OWNER TO iutinfo134;

--
-- Name: patient_idpatient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iutinfo134
--

ALTER SEQUENCE public.patient_idpatient_seq OWNED BY public.patient.idpatient;


--
-- Name: prescription; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.prescription (
    idprescription integer NOT NULL,
    prise date NOT NULL,
    dose integer NOT NULL,
    medicament text NOT NULL,
    idpatient integer,
    medecin text NOT NULL
);


ALTER TABLE public.prescription OWNER TO iutinfo134;

--
-- Name: prescription_idprescription_seq; Type: SEQUENCE; Schema: public; Owner: iutinfo134
--

CREATE SEQUENCE public.prescription_idprescription_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.prescription_idprescription_seq OWNER TO iutinfo134;

--
-- Name: prescription_idprescription_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iutinfo134
--

ALTER SEQUENCE public.prescription_idprescription_seq OWNED BY public.prescription.idprescription;


--
-- Name: prof; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.prof (
    email text NOT NULL,
    matiere text,
    mdp text NOT NULL,
    nom text NOT NULL,
    prenom text NOT NULL
);


ALTER TABLE public.prof OWNER TO iutinfo134;

--
-- Name: radio; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.radio (
    idradio integer NOT NULL,
    image text NOT NULL,
    idpatient integer
);


ALTER TABLE public.radio OWNER TO iutinfo134;

--
-- Name: radio_idradio_seq; Type: SEQUENCE; Schema: public; Owner: iutinfo134
--

CREATE SEQUENCE public.radio_idradio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.radio_idradio_seq OWNER TO iutinfo134;

--
-- Name: radio_idradio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iutinfo134
--

ALTER SEQUENCE public.radio_idradio_seq OWNED BY public.radio.idradio;


--
-- Name: respi; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.respi (
    date timestamp without time zone NOT NULL,
    sao2 integer,
    fr integer,
    o2 text,
    idpatient integer NOT NULL
);


ALTER TABLE public.respi OWNER TO iutinfo134;

--
-- Name: scenario; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.scenario (
    idscenario integer NOT NULL,
    email text,
    idpatient integer
);


ALTER TABLE public.scenario OWNER TO iutinfo134;

--
-- Name: soins; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.soins (
    date timestamp without time zone NOT NULL,
    surveillanceperf boolean NOT NULL,
    pansement boolean NOT NULL,
    surveillanceglycemique double precision NOT NULL,
    basdecontention boolean NOT NULL,
    autre text NOT NULL,
    idpatient integer NOT NULL
);


ALTER TABLE public.soins OWNER TO iutinfo134;

--
-- Name: soinsrelationnels; Type: TABLE; Schema: public; Owner: iutinfo134
--

CREATE TABLE public.soinsrelationnels (
    date timestamp without time zone NOT NULL,
    accueil boolean NOT NULL,
    entretieninfirmer boolean NOT NULL,
    touchermassage boolean NOT NULL,
    idpatient integer NOT NULL
);


ALTER TABLE public.soinsrelationnels OWNER TO iutinfo134;

--
-- Name: groupe idgroupe; Type: DEFAULT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.groupe ALTER COLUMN idgroupe SET DEFAULT nextval('public.groupe_idgroupe_seq'::regclass);


--
-- Name: intervenant idintervenant; Type: DEFAULT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.intervenant ALTER COLUMN idintervenant SET DEFAULT nextval('public.intervenant_idintervenant_seq'::regclass);


--
-- Name: message id; Type: DEFAULT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.message ALTER COLUMN id SET DEFAULT nextval('public.message_id_seq'::regclass);


--
-- Name: patient idpatient; Type: DEFAULT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.patient ALTER COLUMN idpatient SET DEFAULT nextval('public.patient_idpatient_seq'::regclass);


--
-- Name: prescription idprescription; Type: DEFAULT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.prescription ALTER COLUMN idprescription SET DEFAULT nextval('public.prescription_idprescription_seq'::regclass);


--
-- Name: radio idradio; Type: DEFAULT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.radio ALTER COLUMN idradio SET DEFAULT nextval('public.radio_idradio_seq'::regclass);


--
-- Data for Name: alimentation; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.alimentation (date, ajeun, surveillancehydratation, surveillancealimentation, regime, aideaurepas, idpatient) FROM stdin;
2022-11-23 08:11:00	t	f	f	t	f	1
2022-11-04 08:11:00	f	f	f	f	f	1
2022-11-28 09:11:00	f	f	f	f	f	1
2022-11-04 09:11:00	f	f	f	f	f	1
2022-11-18 09:11:00	f	f	f	f	f	1
\.


--
-- Data for Name: cardio; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.cardio (date, ta, pls, ecg, idpatient) FROM stdin;
2022-11-23 08:11:00	rgrgrg	5757	577557	1
2022-11-04 08:11:00	t''t	5126	262	1
2022-11-28 09:11:00	htth	655	5885	1
2022-11-04 09:11:00	hhh	58575	tyyjy	1
2022-11-18 09:11:00	hhhg	5757	ryjyyj	1
\.


--
-- Data for Name: elimination; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.elimination (date, selles, gaz, urines, idpatient) FROM stdin;
2022-11-23 08:11:00	t	t	f	1
2022-11-04 08:11:00	f	f	f	1
2022-11-28 09:11:00	f	f	f	1
2022-11-04 09:11:00	f	f	f	1
2022-11-18 09:11:00	f	f	f	1
\.


--
-- Data for Name: email; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.email (email) FROM stdin;
AdminProf@gmail.com
\.


--
-- Data for Name: etudiant; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.etudiant (email, mdp, nom, prenom, classe, annee, code) FROM stdin;
\.


--
-- Data for Name: groupe; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.groupe (idgroupe, nomgroupe, email, admin) FROM stdin;
\.


--
-- Data for Name: hygiene; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.hygiene (date, toilette, douche, bain, refectionlit, change, soindebouche, preventiondescare, changementdepos, matelasaair, idpatient) FROM stdin;
2022-11-23 08:11:00	t	f	t	f	t	t	f	t	f	1
2022-11-04 08:11:00	f	f	f	f	f	f	f	f	f	1
2022-11-28 09:11:00	f	f	f	f	f	f	f	f	f	1
2022-11-04 09:11:00	f	f	f	f	f	f	f	f	f	1
2022-11-18 09:11:00	f	f	f	f	f	f	f	f	f	1
\.


--
-- Data for Name: intervenant; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.intervenant (idintervenant, nom, prenom, date, compterendu) FROM stdin;
\.


--
-- Data for Name: medicament; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.medicament (nom, cp, prise) FROM stdin;
medic	1	1
\.


--
-- Data for Name: message; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.message (id, email, userx, textmessage, date, idgroupe) FROM stdin;
\.


--
-- Data for Name: miseensecurite; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.miseensecurite (date, barrieredelitprescrite, barrieredelitconfort, serveillancecontention, idpatient) FROM stdin;
2022-11-23 08:11:00	t	f	t	1
2022-11-04 08:11:00	f	f	f	1
2022-11-28 09:11:00	f	f	f	1
2022-11-04 09:11:00	f	f	f	1
2022-11-18 09:11:00	f	f	f	1
\.


--
-- Data for Name: mobilite; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.mobilite (date, aidealamarche, aideaulever, aideaucoucher, aideaufauteil, idpatient) FROM stdin;
2022-11-23 08:11:00	f	t	t	t	1
2022-11-04 08:11:00	f	f	f	f	1
2022-11-28 09:11:00	t	f	f	f	1
2022-11-04 09:11:00	f	f	f	f	1
2022-11-18 09:11:00	f	f	f	f	1
\.


--
-- Data for Name: neuro; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.neuro (date, "t°c", glasgow, eva, algoplus, idpatient) FROM stdin;
2022-11-23 08:11:00	555.649999999999977	6225952	955959	5959	1
2022-11-04 08:11:00	5959.22000000000025	5959.22000000000025	22	5	1
2022-11-18 09:11:00	838386.329999999958	686868.329999999958	686868	686886	1
\.


--
-- Data for Name: note; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.note (email, idscenario, note) FROM stdin;
\.


--
-- Data for Name: patient; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.patient (idpatient, nom, prenom, age, ddn, poids, taille, iep, ipp, sexe, adresse, ville, codepostal) FROM stdin;
1	Tellier	Baptiste	19	2003-01-23	67	174	159	951	Homme	29 avenue de l'esperance, , false	Marcoing	59159
\.


--
-- Data for Name: prescription; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.prescription (idprescription, prise, dose, medicament, idpatient, medecin) FROM stdin;
\.


--
-- Data for Name: prof; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.prof (email, matiere, mdp, nom, prenom) FROM stdin;
AdminProf@gmail.com	\N	$2y$10$MuV/8EnORkpzpk.PYSnHIue3txNXN/ECWYJ4A2nEmp6kQsjKfCE0C	Admin	Admin
\.


--
-- Data for Name: radio; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.radio (idradio, image, idpatient) FROM stdin;
\.


--
-- Data for Name: respi; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.respi (date, sao2, fr, o2, idpatient) FROM stdin;
2022-11-23 08:11:00	955	225229	giullliu	1
2022-11-04 08:11:00	5225	992	grgr	1
2022-11-18 09:11:00	75757	5577557	yjyyjyj	1
\.


--
-- Data for Name: scenario; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.scenario (idscenario, email, idpatient) FROM stdin;
\.


--
-- Data for Name: soins; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.soins (date, surveillanceperf, pansement, surveillanceglycemique, basdecontention, autre, idpatient) FROM stdin;
2022-11-18 09:11:00	f	f	55757.2200000000012	f	r	1
\.


--
-- Data for Name: soinsrelationnels; Type: TABLE DATA; Schema: public; Owner: iutinfo134
--

COPY public.soinsrelationnels (date, accueil, entretieninfirmer, touchermassage, idpatient) FROM stdin;
2022-11-23 08:11:00	f	t	f	1
2022-11-04 08:11:00	f	f	f	1
2022-11-28 09:11:00	f	f	f	1
2022-11-04 09:11:00	f	f	f	1
2022-11-18 09:11:00	f	f	f	1
\.


--
-- Name: groupe_idgroupe_seq; Type: SEQUENCE SET; Schema: public; Owner: iutinfo134
--

SELECT pg_catalog.setval('public.groupe_idgroupe_seq', 1, false);


--
-- Name: intervenant_idintervenant_seq; Type: SEQUENCE SET; Schema: public; Owner: iutinfo134
--

SELECT pg_catalog.setval('public.intervenant_idintervenant_seq', 1, false);


--
-- Name: message_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iutinfo134
--

SELECT pg_catalog.setval('public.message_id_seq', 1, false);


--
-- Name: patient_idpatient_seq; Type: SEQUENCE SET; Schema: public; Owner: iutinfo134
--

SELECT pg_catalog.setval('public.patient_idpatient_seq', 1, true);


--
-- Name: prescription_idprescription_seq; Type: SEQUENCE SET; Schema: public; Owner: iutinfo134
--

SELECT pg_catalog.setval('public.prescription_idprescription_seq', 1, false);


--
-- Name: radio_idradio_seq; Type: SEQUENCE SET; Schema: public; Owner: iutinfo134
--

SELECT pg_catalog.setval('public.radio_idradio_seq', 1, false);


--
-- Name: alimentation alimentation_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.alimentation
    ADD CONSTRAINT alimentation_pkey PRIMARY KEY (date, idpatient);


--
-- Name: cardio cardio_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.cardio
    ADD CONSTRAINT cardio_pkey PRIMARY KEY (date, idpatient);


--
-- Name: elimination elimination_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.elimination
    ADD CONSTRAINT elimination_pkey PRIMARY KEY (date, idpatient);


--
-- Name: email email_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.email
    ADD CONSTRAINT email_pkey PRIMARY KEY (email);


--
-- Name: etudiant etudiant_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.etudiant
    ADD CONSTRAINT etudiant_pkey PRIMARY KEY (email);


--
-- Name: groupe groupe_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.groupe
    ADD CONSTRAINT groupe_pkey PRIMARY KEY (idgroupe, email);


--
-- Name: hygiene hygiene_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.hygiene
    ADD CONSTRAINT hygiene_pkey PRIMARY KEY (date, idpatient);


--
-- Name: intervenant intervenant_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.intervenant
    ADD CONSTRAINT intervenant_pkey PRIMARY KEY (idintervenant);


--
-- Name: medicament medicament_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.medicament
    ADD CONSTRAINT medicament_pkey PRIMARY KEY (nom);


--
-- Name: message message_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.message
    ADD CONSTRAINT message_pkey PRIMARY KEY (id);


--
-- Name: miseensecurite miseensecurite_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.miseensecurite
    ADD CONSTRAINT miseensecurite_pkey PRIMARY KEY (date, idpatient);


--
-- Name: mobilite mobilite_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.mobilite
    ADD CONSTRAINT mobilite_pkey PRIMARY KEY (date, idpatient);


--
-- Name: neuro neuro_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.neuro
    ADD CONSTRAINT neuro_pkey PRIMARY KEY (date, idpatient);


--
-- Name: note note_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.note
    ADD CONSTRAINT note_pkey PRIMARY KEY (email, idscenario);


--
-- Name: patient patient_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.patient
    ADD CONSTRAINT patient_pkey PRIMARY KEY (idpatient);


--
-- Name: prescription prescription_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.prescription
    ADD CONSTRAINT prescription_pkey PRIMARY KEY (idprescription);


--
-- Name: prof prof_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.prof
    ADD CONSTRAINT prof_pkey PRIMARY KEY (email);


--
-- Name: radio radio_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.radio
    ADD CONSTRAINT radio_pkey PRIMARY KEY (idradio);


--
-- Name: respi respi_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.respi
    ADD CONSTRAINT respi_pkey PRIMARY KEY (date, idpatient);


--
-- Name: scenario scenario_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.scenario
    ADD CONSTRAINT scenario_pkey PRIMARY KEY (idscenario);


--
-- Name: soins soins_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.soins
    ADD CONSTRAINT soins_pkey PRIMARY KEY (date, idpatient);


--
-- Name: soinsrelationnels soinsrelationnels_pkey; Type: CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.soinsrelationnels
    ADD CONSTRAINT soinsrelationnels_pkey PRIMARY KEY (date, idpatient);


--
-- Name: alimentation alimentation_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.alimentation
    ADD CONSTRAINT alimentation_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: cardio cardio_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.cardio
    ADD CONSTRAINT cardio_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: elimination elimination_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.elimination
    ADD CONSTRAINT elimination_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: groupe groupe_email_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.groupe
    ADD CONSTRAINT groupe_email_fkey FOREIGN KEY (email) REFERENCES public.etudiant(email);


--
-- Name: hygiene hygiene_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.hygiene
    ADD CONSTRAINT hygiene_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: message message_idgroupe_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.message
    ADD CONSTRAINT message_idgroupe_fkey FOREIGN KEY (idgroupe, email) REFERENCES public.groupe(idgroupe, email);


--
-- Name: miseensecurite miseensecurite_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.miseensecurite
    ADD CONSTRAINT miseensecurite_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: mobilite mobilite_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.mobilite
    ADD CONSTRAINT mobilite_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: neuro neuro_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.neuro
    ADD CONSTRAINT neuro_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: note note_email_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.note
    ADD CONSTRAINT note_email_fkey FOREIGN KEY (email) REFERENCES public.etudiant(email);


--
-- Name: note note_idscenario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.note
    ADD CONSTRAINT note_idscenario_fkey FOREIGN KEY (idscenario) REFERENCES public.scenario(idscenario);


--
-- Name: prescription prescription_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.prescription
    ADD CONSTRAINT prescription_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: radio radio_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.radio
    ADD CONSTRAINT radio_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: respi respi_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.respi
    ADD CONSTRAINT respi_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: scenario scenario_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.scenario
    ADD CONSTRAINT scenario_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: soins soins_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.soins
    ADD CONSTRAINT soins_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- Name: soinsrelationnels soinsrelationnels_idpatient_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iutinfo134
--

ALTER TABLE ONLY public.soinsrelationnels
    ADD CONSTRAINT soinsrelationnels_idpatient_fkey FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- PostgreSQL database dump complete
--

