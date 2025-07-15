--
-- PostgreSQL database dump
--

-- Dumped from database version 15.13 (Homebrew)
-- Dumped by pg_dump version 15.13 (Homebrew)

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

SET default_table_access_method = heap;

--
-- Name: artista; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.artista (
    id integer NOT NULL,
    name character varying(256) NOT NULL,
    biografy text NOT NULL,
    estilo character varying(256) NOT NULL,
    critica text NOT NULL,
    imagen character varying(256) NOT NULL
);


ALTER TABLE public.artista OWNER TO postgres;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    id integer NOT NULL,
    name character varying(60) NOT NULL,
    description text
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- Name: coleccion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.coleccion (
    id integer NOT NULL,
    name character varying(256) NOT NULL
);


ALTER TABLE public.coleccion OWNER TO postgres;

--
-- Name: compra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.compra (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    fecha date NOT NULL,
    importe numeric(11,2) NOT NULL
);


ALTER TABLE public.compra OWNER TO postgres;

--
-- Name: detalles_artista; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.detalles_artista (
    id integer NOT NULL,
    artista_id integer NOT NULL,
    premiacion character varying(256) DEFAULT NULL::character varying,
    curiosidad text NOT NULL,
    ano_inicio integer NOT NULL,
    ano_fallecimiento integer,
    nacionalidad character varying(256) NOT NULL,
    CONSTRAINT detalles_artista_ano_inicio_check CHECK (((ano_inicio >= 1000) AND (ano_inicio <= 2100))),
    CONSTRAINT detalles_artista_ano_inicio_check1 CHECK (((ano_inicio >= 1000) AND (ano_inicio <= 2100)))
);


ALTER TABLE public.detalles_artista OWNER TO postgres;

--
-- Name: detalles_artista_artista_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.detalles_artista_artista_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detalles_artista_artista_id_seq OWNER TO postgres;

--
-- Name: detalles_artista_artista_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.detalles_artista_artista_id_seq OWNED BY public.detalles_artista.artista_id;


--
-- Name: detalles_artista_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.detalles_artista_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detalles_artista_id_seq OWNER TO postgres;

--
-- Name: detalles_artista_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.detalles_artista_id_seq OWNED BY public.detalles_artista.id;


--
-- Name: galeria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.galeria (
    id integer NOT NULL,
    name character varying(256) NOT NULL,
    artista_id integer NOT NULL,
    categoria_id integer NOT NULL,
    coleccion_id integer NOT NULL,
    description text NOT NULL,
    informe text NOT NULL,
    publication integer NOT NULL,
    image character varying(256) NOT NULL,
    price numeric(11,2) NOT NULL,
    CONSTRAINT galeria_publication_check CHECK (((publication >= 1000) AND (publication <= 2100)))
);


ALTER TABLE public.galeria OWNER TO postgres;

--
-- Name: galeria_artista_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeria_artista_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeria_artista_id_seq OWNER TO postgres;

--
-- Name: galeria_artista_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeria_artista_id_seq OWNED BY public.galeria.artista_id;


--
-- Name: galeria_categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeria_categoria_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeria_categoria_id_seq OWNER TO postgres;

--
-- Name: galeria_categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeria_categoria_id_seq OWNED BY public.galeria.categoria_id;


--
-- Name: galeria_coleccion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeria_coleccion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeria_coleccion_id_seq OWNER TO postgres;

--
-- Name: galeria_coleccion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeria_coleccion_id_seq OWNED BY public.galeria.coleccion_id;


--
-- Name: galeria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeria_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeria_id_seq OWNER TO postgres;

--
-- Name: galeria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeria_id_seq OWNED BY public.galeria.id;


--
-- Name: galeria_tecnica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.galeria_tecnica (
    id integer NOT NULL,
    galeria_id integer NOT NULL,
    tecnica_id integer NOT NULL
);


ALTER TABLE public.galeria_tecnica OWNER TO postgres;

--
-- Name: galeria_tecnica_galeria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeria_tecnica_galeria_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeria_tecnica_galeria_id_seq OWNER TO postgres;

--
-- Name: galeria_tecnica_galeria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeria_tecnica_galeria_id_seq OWNED BY public.galeria_tecnica.galeria_id;


--
-- Name: galeria_tecnica_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeria_tecnica_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeria_tecnica_id_seq OWNER TO postgres;

--
-- Name: galeria_tecnica_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeria_tecnica_id_seq OWNED BY public.galeria_tecnica.id;


--
-- Name: galeria_tecnica_tecnica_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.galeria_tecnica_tecnica_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.galeria_tecnica_tecnica_id_seq OWNER TO postgres;

--
-- Name: galeria_tecnica_tecnica_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.galeria_tecnica_tecnica_id_seq OWNED BY public.galeria_tecnica.tecnica_id;


--
-- Name: item_compra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.item_compra (
    id integer NOT NULL,
    compra_id integer NOT NULL,
    item_id integer NOT NULL,
    cantidad integer NOT NULL
);


ALTER TABLE public.item_compra OWNER TO postgres;

--
-- Name: item_compra_compra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.item_compra_compra_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.item_compra_compra_id_seq OWNER TO postgres;

--
-- Name: item_compra_compra_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.item_compra_compra_id_seq OWNED BY public.item_compra.compra_id;


--
-- Name: item_compra_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.item_compra_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.item_compra_id_seq OWNER TO postgres;

--
-- Name: item_compra_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.item_compra_id_seq OWNED BY public.item_compra.id;


--
-- Name: item_compra_item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.item_compra_item_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.item_compra_item_id_seq OWNER TO postgres;

--
-- Name: item_compra_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.item_compra_item_id_seq OWNED BY public.item_compra.item_id;


--
-- Name: tecnica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tecnica (
    id integer NOT NULL,
    name character varying(256) NOT NULL
);


ALTER TABLE public.tecnica OWNER TO postgres;

--
-- Name: tecnica_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tecnica_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tecnica_id_seq OWNER TO postgres;

--
-- Name: tecnica_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tecnica_id_seq OWNED BY public.tecnica.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    user_name character varying(30) NOT NULL,
    name character varying(256) NOT NULL,
    email character varying(256) NOT NULL,
    password character varying(256) NOT NULL,
    role text NOT NULL,
    activo smallint DEFAULT 0 NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    CONSTRAINT usuarios_role_check CHECK ((role = ANY (ARRAY['superadmin'::text, 'admin'::text, 'client'::text])))
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: views; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.views (
    id integer NOT NULL,
    name character varying(256) NOT NULL,
    title character varying(256) NOT NULL,
    description text NOT NULL,
    activa smallint NOT NULL,
    restringida smallint NOT NULL
);


ALTER TABLE public.views OWNER TO postgres;

--
-- Name: COLUMN views.description; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.views.description IS 'Descrição da pagina para meta tag';


--
-- Name: COLUMN views.activa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.views.activa IS 'Valores para 0 à 1 se estiver ativo';


--
-- Name: COLUMN views.restringida; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.views.restringida IS 'Valores para 0 à 1 se estiver restringido';


--
-- Name: views_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.views_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.views_id_seq OWNER TO postgres;

--
-- Name: views_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.views_id_seq OWNED BY public.views.id;


--
-- Name: detalles_artista id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalles_artista ALTER COLUMN id SET DEFAULT nextval('public.detalles_artista_id_seq'::regclass);


--
-- Name: detalles_artista artista_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.detalles_artista ALTER COLUMN artista_id SET DEFAULT nextval('public.detalles_artista_artista_id_seq'::regclass);


--
-- Name: galeria id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeria ALTER COLUMN id SET DEFAULT nextval('public.galeria_id_seq'::regclass);


--
-- Name: galeria artista_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeria ALTER COLUMN artista_id SET DEFAULT nextval('public.galeria_artista_id_seq'::regclass);


--
-- Name: galeria categoria_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeria ALTER COLUMN categoria_id SET DEFAULT nextval('public.galeria_categoria_id_seq'::regclass);


--
-- Name: galeria coleccion_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeria ALTER COLUMN coleccion_id SET DEFAULT nextval('public.galeria_coleccion_id_seq'::regclass);


--
-- Name: galeria_tecnica id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeria_tecnica ALTER COLUMN id SET DEFAULT nextval('public.galeria_tecnica_id_seq'::regclass);


--
-- Name: galeria_tecnica galeria_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeria_tecnica ALTER COLUMN galeria_id SET DEFAULT nextval('public.galeria_tecnica_galeria_id_seq'::regclass);


--
-- Name: galeria_tecnica tecnica_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.galeria_tecnica ALTER COLUMN tecnica_id SET DEFAULT nextval('public.galeria_tecnica_tecnica_id_seq'::regclass);


--
-- Name: item_compra id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.item_compra ALTER COLUMN id SET DEFAULT nextval('public.item_compra_id_seq'::regclass);


--
-- Name: item_compra compra_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.item_compra ALTER COLUMN compra_id SET DEFAULT nextval('public.item_compra_compra_id_seq'::regclass);


--
-- Name: item_compra item_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.item_compra ALTER COLUMN item_id SET DEFAULT nextval('public.item_compra_item_id_seq'::regclass);


--
-- Name: tecnica id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tecnica ALTER COLUMN id SET DEFAULT nextval('public.tecnica_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Name: views id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.views ALTER COLUMN id SET DEFAULT nextval('public.views_id_seq'::regclass);


--
-- Data for Name: artista; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.artista (id, name, biografy, estilo, critica, imagen) FROM stdin;
1	Christian Montenegro	Christian Montenegro es un reconocido ilustrador y diseñador gráfico argentino, nacido en Buenos Aires. Se licenció en Diseño Gráfico por la Universidad de Buenos Aires (UBA) y, tras un periodo trabajando en diseño, orientó su carrera hacia la ilustración, especialmente en el ámbito editorial e infantil. Es conocido internacionalmente por su trabajo con diversas editoriales, creando libros que exploran la forma, el color y la narrativa visual de manera innovadora. Su trabajo ya ha sido reconocido con importantes premios y menciones, como el Bologna Ragazzi Award.	Estilo Ilustrador Gráfico, Geometrico, Arte Popular, Formas Sintéticas, Planos y Planos, Uso de Colores vibrante, a menudo utiliza <strong>figuras estilizadas</strong>, casi como pictogramas.	Montenegro invita a reflexionar sobre la forma en que construye su visión, explorando temas como la percepción, la transformación, la relación entre los individuos, y puede tener una «crítica» como reto para descifrar el significado en sus ilustraciones.	public/images/artistas/ChristianMontenegro.jpg
2	Antonio Berni	Antonio Berni (1905-1981) fue uno de los grandes artistas plásticos argentinos y un innovador en el uso del arte como herramienta de transformación social. Berni comenzó su carrera en el impresionismo, pero pronto se adentró en el realismo social, utilizando su obra para representar las desigualdades y la vida de las clases trabajadoras. Tras estudiar en Europa, absorbió influencias del surrealismo y los movimientos de vanguardia, pero se estableció como exponente del «Nuevo Realismo», donde mezclaba técnicas tradicionales con materiales reciclados y objetos encontrados, creando obras que narraban la realidad latinoamericana con brutal honestidad y compasión. Su obra está marcada por personajes emblemáticos como Juanito Laguna y Ramona Montiel, símbolos de las tensiones sociales y urbanas.	Realismo Social, Novo Realismo, Surrealismo.	Con su arte denunció la injusticia social, la pobreza, la explotación laboral y la marginación urbana.	public/images/artistas/AntonioBerni.jpg
3	Ad Minoliti	Ad Minoliti (Buenos Aires, 1980) es una artista contemporánea argentina reconocida internacionalmente por su obra, en la que se entrecruzan el arte, la teoría de género y el imaginario queer. Con formación en pintura tradicional, Minoliti empuja los límites de la geometría abstracta para crear universos alternativos que rompen las normas binarias de género, sexualidad y sociedad. Sus obras mezclan colores vibrantes, personajes híbridos y espacios utópicos, proponiendo realidades en las que las estructuras sociales pueden reinventarse de forma lúdica e inclusiva. Con exposiciones en prestigiosos museos como el Guggenheim y la Bienal de Venecia, Minoliti es una voz innovadora en el debate contemporáneo sobre identidad y política visual.	Abstracción geométrica contemporánea, Arte queer, Arte posthumano	Crítica las normas sociales tradicionales. A través de narraciones visuales que cuestionan los conceptos de género, sexualidad y organización social, Minoliti crea entornos en los que se deconstruye la lógica heteronormativa.	public/images/artistas/AdMinoliti.jpg
4	Xul Solar	Xul Solar (1887-1963), nacido Oscar Agustín Alejandro Schulz Solari, fue uno de los artistas más visionarios y enigmáticos de América Latina. Argentino de origen multicultural, su obra trasciende la pintura, la escultura, la literatura y la lingüística. Xul creó lenguas imaginarias, como el «Neocriollo» y la «Pan Lingua», y diseñó ciudades e instrumentos místicos. Sus cuadros combinan elementos esotéricos, astrológicos y simbólicos en composiciones geométricas y oníricas, anticipando ideas de multiculturalismo y espiritualidad globalizada. Amigo e influyente de figuras como Jorge Luis Borges, Xul Solar está considerado un pionero del arte moderno latinoamericano y un creador de universos paralelos, tanto visuales como intelectuales.	Surrealismo, Abstracionismo Místico, Vanguardismo Latino-Americano.	Subvierte la realidad y propone alternativas radicales para la existencia con critica simbólica y filosóficamente los límites del lenguaje, la religión y las estructuras culturales actuales.	public/images/artistas/XulSolar.jpg
5	Luis Felipe Noé	Nacido el 26 de mayo de 1933 en Buenos Aires, estudió pintura con Horacio Butler y cursó Derecho en la UBA. En 1959, debutó en la Galería Witcomb. En 1961, cofundó el grupo «Otra Figuración». Publicó Antiestética (1965) y desarrolló una intensa carrera hasta 1976, cuando se exilió en París durante la dictadura. Regresó a Argentina, fundó el bar «Bárbaro», organizó exposiciones, desarrolló una sólida carrera como teórico y pintor, y falleció el 9 de abril de 2025 a los 91 años. Pintura neofigurativa y neoexpresionista, de colores vivos, gestos agresivos y soportes fragmentados; explora el caos como principio estructurador, fusionando collage, ensamblaje e instalación. 	 Pintura neofigurativa y neoexpresionista, de colores vivos, gestos agresivos y soportes fragmentados; explora el caos como principio estructurador, fusionando collage, ensamblaje e instalación.	Se centra en la interdicción entre dibujo y pedagogía, explorando los procesos colectivos, la crítica institucional y el potencial político de la línea y el trazo.	public/images/artistas/1749872268.jpg
6	Claudia Del Rio	Nacida en 1957 en Rosario, Argentina, Claudia del Río comenzó su formación artística a una edad temprana, estudiando teatro y pintura. Se licenció en Artes Visuales por la Universidad Nacional de Rosario (1975-1980). Estuvo activa en las décadas de 1980 y 1990, participando en movimientos como el arte postal y realizando intervenciones colectivas. Su obra evolucionó incorporando técnicas como el collage, el bordado y la instalación, abordando temas sociales y políticos con un enfoque crítico y poético. Además de su práctica artística, ha trabajado como educadora y comisaria, promoviendo el arte como herramienta de transformación social. Además, trae una reflexión continúa sobre las tensiones entre el local y global, el colectivo y el individual. Sus obras cuestiona las narrativas dominantes y propone una reinterpretación crítica de la realidad, con uso de ironía y subversión como herramienta. Además, aborda una tematica como violencia, feminismo, consumo y cuestiones políticas.	Utilización del dibujo, el collage, el arte postal, el bordado y la exploración de elementos pictóricos combinados con prácticas performativas y literarias.	Se centra en la interdicción entre dibujo y pedagogía, explorando los procesos colectivos, la crítica institucional y el potencial político de la línea y el trazo.	public/images/artistas/1750260758.jpg
7	Gaby Messina	Gaby Messina nació el 16 de marzo de 1971 en la provincia de Buenos Aires. Estudió publicidad y publicidad fotográfica, asistiendo a reconocidos talleres desde 1999. Se convirtió en fotógrafa dedicada a retratos, proyectos documentales, videoarte y publicaciones de libros. Su obra explora la identidad, la historia y los imaginarios colectivos, y ha realizado exposiciones internacionales en Buenos Aires, Atlanta, Medellín, Tokio, Johannesburgo y Dakar.	Retratos poéticos de colores vibrantes, composiciones cuidadas y una narrativa intimista que mezcla el documental y el ensayo personal sobre la identidad, la memoria y la vida cotidiana.	Cuestiona las narrativas hegemónicas (especialmente la identidad afroargentina), desafiando la eliminación histórica a través de imágenes que valoran las voces y subjetividades marginadas.	public/images/artistas/1750340028.jpg
27	Luciana Bretesh	Luciana Betesh nasceu em Buenos Aires em 1973. Formou-se em cinema (FUC) e fez mestrado em Artes na NYU (1999). Recebeu bolsas da Fulbright e Antorchas, participou da residência no Banff Centre (Canadá). Desde os anos 2000 expõe individual e coletivamente (Buenos Aires, EUA, Canadá). Sua obra integra o MAMBA e o Museu Moderno de Buenos Aires. Em 2009, foi premiada no Salón Nacional e Expotrastiendas. Baseada em Buenos Aires, atua como fotógrafa, cineasta e artista visual.  	Abstracionismo fotográfico e minimalista. Usa gelatina de prata e dípticos, explorando luz, sombra e textura em composições elegantes, suspensas entre sonho e silêncio	Desafia o registro literal, propondo um olhar íntimo e onírico sobre a natureza e o espaço pessoal. Suas imagens evocam sentimentos e memórias, além do visível.	public/images/artistas/1750905833.jpg
51	Jorge de la Vega	Jorge Luis de la Vega (Buenos Aires, 27/03/1930 - 26/08/1971) fue un polifacético artista autodidacta: pintor, grabador, dibujante, publicista, poeta, cantante y profesor. Comenzó sus estudios de Arquitectura en la UBA, pero los abandonó para dedicarse al arte. En la década de 1950 se movió entre el arte figurativo, el geométrico y el informalismo. En 1960 se unió al grupo Nueva Figuración con Rómulo Macció, Ernesto Deira y Luis Felipe Noé, estrenando la problemática exposición «Otra Figuración» en 1961. De la Vega vivió en París (1962) y Nueva York/Ithaca (1965-67), donde incorporó técnicas pop y psicodélicas, experimentando con el collage, el estarcido y los marcos rotos. De regreso a Buenos Aires en 1968, inició una carrera como compositor e intérprete visual, que culminó con la exposición-concierto «Rompecabezas» en 1970. Murió en 1971, a los 41 años, dejando tras de sí un legado vibrante e innovador.	Comenzó con la pintura figurativa y la geometría óptica, influido por los abstraccionistas, y emigró al neofiguracionismo, fusionando pintura explosiva, colores vibrantes, collages y diversidad de materiales.	 Refuta el formalismo, promoviendo una pintura de laboratorio que estimula el choque sensorial: formas vivas, texturas densas, ruptura del plano y explosión de materiales.	public/images/artistas/1752527525.jpg
\.


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categoria (id, name, description) FROM stdin;
1	Ilustración	Explora narrativas visuales vibrantes y simbólicas, mezclando crítica social, geometría y surrealismo. Desde el arte digital al trazo analógico, la ilustración aquí presente provoca, deleita y cuestiona.
2	Pintura	Los colores intensos y las formas experimentales expresan realidades paralelas y críticas culturales. De la abstracción al expresionismo, cada pincelada refleja identidad, ideología y emoción pura.
3	Arte	Una categoría amplia que fusiona lenguajes visuales, conceptos y técnicas. Un territorio donde lo absurdo, lo político y lo espiritual conviven en constante reinvención estética y simbólica.
4	Fotografía	Conocida como fotografía de bellas artes, es una forma de expresión visual que busca comunicar ideas, emociones y conceptos a través de imágenes. A diferencia de la fotografía documental o comercial, la fotografía artística se centra en la visión personal del fotógrafo, utilizando la técnica y la composición para crear una obra que transmita un significado más profundo, más allá de la mera representación de la realidad. \\r\\n
\.


--
-- Data for Name: coleccion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.coleccion (id, name) FROM stdin;
1	Mundo Complejo.
2	Sentimientos Expuesto.
3	Complejidad Social.
4	Juanito Laguna.
5	Ramona Montiel.
6	Critica Social.
7	Misticismo.
8	Juegos.
9	Arquitectura Esotérica.
23	Introducción a la Esperanza
24	Formas y Figuras
30	Grandes Mujeres
31	Dans La Nuit
32	Algo
33	Constantini
\.


--
-- Data for Name: compra; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.compra (id, id_usuario, fecha, importe) FROM stdin;
1	3	2025-07-10	273500.00
2	1	2025-07-10	417100.00
7	3	2025-07-11	294000.00
8	3	2025-07-11	430000.00
9	1	2025-07-11	550400.00
10	1	2025-07-11	199900.00
11	3	2025-07-13	405900.00
\.


--
-- Data for Name: detalles_artista; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.detalles_artista (id, artista_id, premiacion, curiosidad, ano_inicio, ano_fallecimiento, nacionalidad) FROM stdin;
1	1	Premio Konex de Ilustración (2012)	Estudió diseño gráfico y se formó con Alberto Breccia en historieta; fusiona la gráfica vectorial con influencias del arte popular. Empezo a actuar en 2000 como Ilustrador Profesional.	2000	\N	Argetina
2	2	Gran Premio de Honor del Salón Nacional (1929); Premio Internacional de Grabado en la Bienal de Venecia (1962)	Creó los personajes Juanito Laguna y Ramona Montiel, símbolos de la marginalidad urbana.	1920	1981	Argentina
3	3	Beca Fundación Cisneros Fontanals (CIFO) (2016); \\r\\nParticipó en Bienales como la de Venecia (2022)	Su obra mezcla arte queer, ciencia ficción y geometría abstracta; fundadora del “Feminist Art School”.	2010	\N	Argentina
4	4	No recibió premios internacionales importantes en vida, pero fue valorado póstumamente como visionario.	Inventó idiomas, creó un sistema astrológico propio y desarrolló un juego místico: el “panajedrez”. Empezo sus proyectos en 1912 viajando a Europa.	1912	1963	Argentina
6	5	Premio Nacional Di Tella (1963), Beca Guggenheim (1965, 1966), Bienal de San Pablo (1985, retrospectiva histórica do grupo), Prêmio a la Trajetoria da Academia Nacional de Bellas Artes (2015), Mención de Honor Bienal de Grabado de Tóquio (1968) y Grande P 	A mediados de los 60, dejó de pintar durante casi nueve años, por considerarlo insuficiente para expresar el caos; reformuló su enfoque y regresó en 1975 con renovado vigor. Y fundó en Buenos Aires el bar «Bárbaro», destacado punto de encuentro cultural en los años 60 y 70. Fue un prolífico ensayista, autor de más de 20 libros, entre ellos Antiestética (1965) y Asumir el caos (2024), su última obra teórica.	1959	2025	Argentino (Buenos Aires)
7	6	Premiación Konex de Diseño 2022, Konex Carrera Artistica 2022, Premio de carrera artistica de Museu Nacional de Belas Artes 2022	Fundadora de la asociación Latino Americana y del Caribe Artista Correo (1984), fue ilustre en la utilización de arte postal como medio de comunicación y expresión artística colectiva, en medio la crisis económica en 2001 en Argentina, confundo el club del Dibujo (2002), una plataforma que promueve la troca artística y el acceso democrático al diseñar, reuniendo profesionales, amadores y curiosos en un solo espacio de creación colectiva.\\r\\n\\r\\nSu Proyecto \\"Pieza Pizarrón\\" (2006-2012) es una intervención espacial interactiva que combina diseño, teatro y pedagógica, siendo presentada en diversas versiones y formatos al longo de los años.	1975	\N	Argentina
8	7	Premio de Mejor Colección de Fotografía (barcelona), Premio de mejor fotografía Artes VIsuales (Buenos Aires)	Comenzó su carrera fotográfica personal en 1999 y sigue en activo hasta hoy, con proyectos y exposiciones regulares (las últimas están previstas para 2022 y 2023). En 2005, la conocida revista estadounidense Aperture dedicó una portada y 10 páginas a la serie «Grandes Mujeres». Harvard también tenía previsto exponerla en el David Rockefeller Centre.	1999	\N	Argentina
9	27	Premiación de Residencia no Banff Center for the Arts (Canadá, 1990), Premio expotrastiedas de fotografía (2009), Mención Honrosa, Salón Nacional de Artes Visuales (2009)	Iniciando sua carreira como fotografá profissional no final dos anos 90, após guardarse em 1994 e mestrar-se em 1999.\\r\\n\\r\\nEm 2004, Luciana co-organizou e contribuiu para o livro e exposição Rutas y caminos, projetando uma Argentina alternativa e pessoal — uma espécie de road‑movie fotográfica apresentada no MAMBA.	1990	\N	Argentina
16	51	Premiación de diseño Bonino	Jorge de la Vega no se limitó a la pintura: fue profesor de Visión II en la Facultad de Arquitectura de la UBA (1952-65) antes incluso de terminar la carrera. También fue creativo publicitario, ilustrador y poeta. En 1962, en París, rompió las bambalinas de sus cuadros, una práctica intencionada para liberar la forma pictórica en el espacio, preludio de sus fases «Formas liberadas» y «Bestiario» (1963-66). En 1970 presentó en la galería Carmen Waugh la exposición-concierto Rompecabezas, una muestra en la que pintaba en directo mientras interpretaba monólogos y canciones, mezclando performance, humor y crítica social. Su música era a la vez protesta y sátira: en «Inadaptación» ironiza sobre la autocomplacencia popular al afirmar que «nos hemos adaptado a ser sonrientes / aunque seamos indiferentes».	1935	1970	Argentina
\.


--
-- Data for Name: galeria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.galeria (id, name, artista_id, categoria_id, coleccion_id, description, informe, publication, image, price) FROM stdin;
1	El Corazón de la Ciudad	1	1	1	Ilustración digital que explora a complexidad emocional das metrópolis modernas por medio de formas geométricas vibrantes.	Ilustración digital que explora la complexidad emocional de los humanos.	2018	public/images/artes/cristian_montenegro/los_personajes.jpg	32500.00
2	Mentes Conectadas	1	2	2	Obra que retrata a fusão entre o homem e a tecnologia, representando redes neurais com uma estética cyberpunk sul-americana.	Ilustración de la obra que retrata una fusión del homem y la tecnologia.	2019	public/images/artes/cristian_montenegro/los_visuales.jpg	42100.00
3	Tiempos Modernos	1	1	1	Inspirada em Chaplin, essa ilustracion mistura crítica social e visual futurista para representar o homem frente às engrenagens do sistema.	Una ilustración de mistura de colores.	2018	public/images/artes/cristian_montenegro/gato.jpg	36800.00
4	El Jardin de los Pensamientos	1	1	1	Pintura digital surrealista que representa ideias e memórias como flores abstratas numa mente expandida.	Pintura digital surrealista que representa ideas y memórias como flores abstractas.	2018	public/images/artes/cristian_montenegro/criaturas.jpg	49200.00
5	Fragmentos del Futuro	1	1	1	Obra ilustración que mistura colagem digital e ilustracion vetorial, refletindo a fragmentação da identidade na era digital.	Islutración que mistura colagen digital e ilustración vectorial.	2018	public/images/artes/cristian_montenegro/2147994324.jpg	53700.00
6	Los Ojos	3	1	3	Obra que retrata um ritual ocultista em um campo noturno, com figuras enigmáticas colhendo entidades espectrais.	Una obra ilustractiva que retra ritual ocultista en campos nocturno, uso de grafismo y colores oscuros.	2017	public/images/artes/ad_minoliti/los_ojos.jpg	45900.00
7	b	3	1	3	Pintura inspirada no Egito místico, com uma figura andrógina usando um véu cerimonial sob a luz de constelações ocultas.	Una Ilustración del Diseño que representa el mistico del Egito, una figura andrógina con un velo ceremonial bajo la luz de constelaciones ocultas	2017	public/images/artes/ad_minoliti/b.jpg	52500.00
8	The Octopus	3	1	3	Personagens fantásticos que habitam florestas sombrias e mágicas. Partes da mitologia própria do artista.	Una Ilustración de un polvo que representa el abitual mistico, sombrio y mitologico.	2017	public/images/artes/ad_minoliti/octopus.jpg	40900.00
9	Casa de Juegos	3	1	3	Composição simbólica em que um corvo negro atua como juiz de almas perdidas em um tribunal arcano.	Una Ilustración del Simbolismo de las imagenes de juegos en un hogar.	2017	public/images/artes/ad_minoliti/casa_de_juegos.jpg	38900.00
10	Las Estaciones del Dolor	3	1	3	Obra composta por quatro personagens, cada um representando uma estação emocional: perda, melancolia, medo e aceitação.	Una Ilustación de un Circulo con formaciones misticas que juegon con sus caracteristicas.	2017	public/images/artes/ad_minoliti/circulo.jpg	54800.00
11	Juanito Laguna va a la Ciudad	2	2	4	Partes da série icônica de Juanito Laguna, representa a travessia do garoto pelas paisagens urbanas e industriais da Argentina.	Una Pintura de representación de un niño que viaja a la ciudad, parte de la serie icónica de Juanito Laguna.	1963	public/images/artes/antonio_berni/juanito_laguna.jpg	67500.00
12	Ramona Espera	2	2	5	Retrata Ramona Montiel, personagem criada por Berni para denunciar a marginalização e os conflitos sociais da mulher urbana.	Una pitura sobre Romana Montiel donde denuncia la marginalización de sus conflictos.	1965	public/images/artes/antonio_berni/ramona_espera.jpg	70200.00
13	La Gran Tentación	2	2	6	Cena alegórica que critica o consumismo e a desigualdade social através de simbolismos visuais intensos.	Una Pintura critica al consumismo y desigualdade social.	1962	public/images/artes/antonio_berni/gran_tencion.jpg	75800.00
14	Retrato de Juanito	2	2	4	Um retrato íntimo do garoto Juanito, com uma combinação de realismo e colagem sobre papel reciclado.	Pintura que habala sobre realismo del retrato de juanito, misturando colores y elementos verdadero.	1961	public/images/artes/antonio_berni/retrato_juanito.jpg	68500.00
15	Juanito y la Televisión	2	3	4	Crítica à influência da mídia sobre as crianças pobres, usando objetos reais e sucata na composição.	Pintura que critica la influencia de la mídia sobre los niños pobres.	1974	public/images/artes/antonio_berni/juanito_television.jpg	82800.00
16	Pan Tree	4	2	7	Representação mística de uma árvore do pão celeste, partes do universo simbólico inventado por Xul.	Una pintura de la representación mística de una árvore del pan celeste, partes del universo simbólico inventado por Xul.	1940	public/images/artes/xul_solar/pan_tree.jpg	64000.00
17	Signos Zodicales	4	2	7	Figura mítica baseada em línguas inventadas por Xul, incorporando astrologia e espiritualidade hermética.	Una pintura de una figuración mistica basada en la linguage inventadas por Xul.	1935	public/images/artes/xul_solar/signos_zodicales.jpg	68900.00
18	Drago	4	2	7	Dragón alado construído con formas geométricas y cores arquetípicas, representando las fuerzas ocultas.	Una pintura de un Dargon alado contruido por formas geométricas y cores arquetipicas.	1927	public/images/artes/xul_solar/drago.jpg	72200.00
19	Pan Juego	4	3	8	Obra-conceito que propõe um jogo místico baseado em idiomas e geometrias próprios do artista.	Una obra conceito que propone un juego mistico basado en los idiomas.	1949	public/images/artes/xul_solar/panjuego.jpg	84900.00
20	Vuel Villa	4	3	9	Cidade utópica e espiritual, desenhada com influência do esoterismo, tecnologia e urbanismo simbólico.	Una pintura de ciudad utópicas espiritual.	1936	public/images/artes/xul_solar/vuel_villa.jpg	79100.00
41	Pájaros ambiguos 	5	2	23	Pájaros ambiguos es una obra gráfica de Luis Felipe Noé realizada en 1985 como parte de una serie limitada. Representa su enfoque característico de la desorganización formal como estructura expresiva. En esta serigrafía, Noé combina colores intensos y líneas dinámicas para evocar una escena de movimiento caótico. El título refleja la dualidad entre lo figurativo y lo abstracto, y sugiere una interpretación abierta sobre identidad, libertad y multiplicidad de formas. La obra, aunque bidimensional, transmite profundidad psicológica a través del ritmo visual de los elementos. Es un claro ejemplo de cómo Noé aplica su teoría del “caos como orden” también al lenguaje gráfico.	La imagen muestra una bandada de pájaros estilizados en pleno vuelo, delineados con trazos gestuales que se entrelazan. Los cuerpos de las aves parecen disolverse en manchas de color, generando una tensión entre figura y fondo. La composición sugiere dinamismo y ambigüedad formal.	1985	public/images/artes/1750706413.Jpeg	80000.00
42	Nerviosa Geografías	6	3	24	Nerviosa Geografía es una obra que toma como punto de partida mapas escolares de Argentina que han sido duplicados, invertidos y reorganizados. Esta intervención crea nuevas configuraciones visuales y conceptuales, donde las líneas frágiles de los mapas se transforman en formas inciertas, ambiguas y poéticas. La obra interpela la centralidad del territorio y propone una lectura descentralizada del espacio geográfico, a partir de una estética del rizoma que se aleja de lo jerárquico y lo lineal. Se trata de una cartografía sensible que mezcla elementos sociales, políticos y emocionales.	La imagen presenta un mapa argentino manipulado y fragmentado, intervenido con corsés, líneas orgánicas y figuras de connotación simbólica. Las formas están superpuestas, generando una sensación de multiplicidad territorial, fractura identitaria y crítica a los modelos hegemónicos de representación espacial.	1999	public/images/artes/1750707096.jpg	56000.00
43	Introducción a la esperanza	5	2	23	Esta obra emblemática de 1963 marca a fase madura de Noé dentro do movimento “Otra Figuración”. Trata-se de um óleo e esmalte sobre nove bastidores entelados, medindo 201 × 214 cm. A pintura desconstrói o suporte tradicional, incorporando cartazes e painéis que emergem da estrutura pictórica principal. Por meio de pinceladas gestuais, contrastes e oposição entre elementos, Noé explora a ideia do caos como estrutura. Intencionalmente fragmentada, a composição reflete a tensão social argentina dos anos 60, ao mesmo tempo em que reivindica libertação estética e política.	Esta obra emblemática de 1963 marca a fase madura de Noé dentro do movimento “Otra Figuración”. Trata-se de um óleo e esmalte sobre nove bastidores entelados, medindo 201 × 214 cm. A pintura desconstrói o suporte tradicional, incorporando cartazes e painéis que emergem da estrutura pictórica principal. Por meio de pinceladas gestuais, contrastes e oposição entre elementos, Noé explora a ideia do caos como estrutura. Intencionalmente fragmentada, a composição reflete a tensão social argentina dos anos 60, ao mesmo tempo em que reivindica libertação estética e política.	1963	public/images/artes/1750714762.jpg	78000.00
50	Grandes Mujeres: Galina	7	4	30	La fotografía retrata a Galina, una mujer de origen ruso residente en Argentina, captada por Gaby Messina en su entorno cotidiano. La imagen forma parte del proyecto Grandes Mujeres, en el que la artista homenajea a mujeres reales, anónimas o no, destacando sus historias de vida y su capacidad de resistencia con sensibilidad, dignidad y fuerza estética. La serie crea un registro visual que valora lo femenino como pilar cultural y humano.	La imagen muestra a Galina en su espacio íntimo, rodeada de elementos que recuerdan su identidad y su experiencia, revelando con delicadeza su fuerza, su historia y su feminidad madura. Es un retrato sensible que celebra la belleza de la mujer corriente.	2000	public/images/artes/1752523183.jpg	31000.00
51	Dípitico N°5	27	4	31	El díptico presenta dos imágenes casi simétricas en gelatina plateada, con una composición minimalista: paredes pálidas, un cuadro «New Yorker» y una lámpara sobre una mesita. La sutileza de la luz, las discretas sombras y el silencio sugieren un momento contemplativo e íntimo, invitando al espectador a imaginar la narrativa oculta tras la serena escena.	Registra un espacio doméstico y cotidiano -probablemente un rincón de un salón o de un dormitorio- haciendo hincapié en elementos sencillos (cuadro, mesa, lámpara) como símbolos de la memoria, la nostalgia y la presencia silenciosa.	1999	public/images/artes/1752523675.jpg	15000.00
52	Rita	7	4	30	m “Rita”, Messina retrata uma mulher idosa sentada em um ambiente doméstico carregado de memórias visuais. A paleta quente, composta pela luz natural filtrada e os tons terrosos, contrasta com a expressão serena e confiante da retratada. Objetos ao redor — móveis clássicos e ornamentos — servem como alusões ao tempo vivido e às histórias adquiridas ao longo da vida, transformando o retrato em uma narrativa visual sobre identidade, resiliência e presença poética.	Rita, uma senhora, posa de forma tranquila próxima a elementos de sua rotina e lembranças — um cenário repleto de detalhes domésticos que revelam sua trajetória pessoal e afeto pelo ambiente que a cerca.	2002	public/images/artes/1752524220.jpg	20000.00
53	La humanidad está sola	51	3	33	Obra de la fase de transición (1965), combina óleo y collage sobre lienzo. Muestra figuras antropomorfas en estado de fragmentación: ojos, bocas, miembros discontinuos surgen entre manchas de color y líneas orgánicas, transmitiendo una sensación de soledad y caos existencial. La abrupta mezcla de elementos visuales refuerza la tensión entre lo individual y lo colectivo, cuestionando el aislamiento humano en medio de la agitación social.	Retrata una o varias figuras humanas deconstruidas, con rasgos anatómicos sueltos (ojos, bocas, manos) sobre una superficie caótica, símbolos de la fragmentación y la alienación contemporáneas.	1965	public/images/artes/1752529665.jpg	110000.00
\.


--
-- Data for Name: galeria_tecnica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.galeria_tecnica (id, galeria_id, tecnica_id) FROM stdin;
1	1	1
2	3	1
3	4	1
4	5	1
5	6	1
6	8	1
7	10	1
8	2	2
9	12	2
10	13	2
11	16	2
12	17	2
13	3	3
14	5	3
15	4	4
16	6	4
17	7	4
18	8	4
19	9	4
20	2	5
21	7	6
22	9	6
23	10	6
24	11	7
25	12	7
26	13	7
27	14	7
28	15	7
29	19	7
30	11	8
31	14	8
32	15	8
33	16	9
34	17	9
35	18	9
36	19	9
37	20	9
38	18	10
39	20	10
40	1	4
54	41	10
55	41	5
56	41	8
57	42	2
58	42	4
59	42	3
60	43	5
61	43	8
77	50	2
78	50	14
79	50	18
80	51	2
81	51	14
82	51	18
83	51	19
84	52	2
85	52	14
86	52	18
87	52	19
89	53	2
91	53	7
92	53	5
93	53	3
\.


--
-- Data for Name: item_compra; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.item_compra (id, compra_id, item_id, cantidad) FROM stdin;
1	1	2	3
2	1	3	4
3	2	5	3
4	2	16	4
5	7	6	4
6	7	3	3
7	8	43	2
8	8	14	4
9	9	20	4
10	9	43	3
11	10	2	3
12	10	3	2
13	11	7	3
14	11	15	3
\.


--
-- Data for Name: tecnica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tecnica (id, name) FROM stdin;
9	Aguarela
7	Colagen
2	Espresionismo
14	Fine Art
18	Fotografía Artistica
19	Fotografía de Espacios
6	Geometría
10	Guache
4	Ilustración
5	Pintura Óleo
8	Pintura Realista
3	Planos
1	Vetorial
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id, user_name, name, email, password, role, activo, created_at, updated_at) FROM stdin;
1	devmalbateam	Afonso Gesualdi	arruda.afo@malbateam.com.ar	$2y$10$blEXW0ZEWwrihd1AOyZrZucbxxjIpw7bfFQa.7XM9mc764loEZi.e	superadmin	1	2025-06-18 14:58:56	2025-06-18 21:42:02
2	revisionesteam	Jorge Perez	revisiones@malbateam.com.ar	$2y$10$75t2ywsIDx3VRlMATPy1YOFIFWC1BwCVKt4OW6vC5jVGDewKT6EGK	admin	1	2025-06-26 17:02:05	2025-06-26 17:03:04
3	lauratexeira	Laura Texeira	laura.texeira@gmail.com	$2y$10$qxweyENBBlN3rI4qk72Lku6XVvWiJKHjCLZ2dO0n8jwvxzYx6lQA6	client	1	2025-06-26 17:02:05	2025-06-26 17:03:18
\.


--
-- Data for Name: views; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.views (id, name, title, description, activa, restringida) FROM stdin;
1	home	Tienda MALBA Artistica	Presentación inicial de un proyecto malba con relación a vendas de pinturas ilustractivas a nuestros artistas Argentinos Locales conocidos.	1	0
2	about	Quienes Somos?	Quien es MALBA, un mueso localizado en Argentina con las inumeras islutraciones artisticas de LATAM.	1	0
3	galery	Galeria de Productos	Bienvenido a selección de filtros de nuestra galeria, filtro a Ilustraciones, Artes y Pinturas diferenciadas y personalizadas.	1	0
4	artista	Artistas Crhsitian Montenegro, Antonio Berni, Ad Minoliti, Xul Solar.	Bienvenido a la historia de cada uno de nuestros artisitas, viajamos un poco a sus movimiento, biografia, criticas y sus artes publicadas en nuestra galeria.	1	0
5	producto	Especificaciones tecnicas del producto	Pagina dedicada a la exibición mas avanzada de las especificaciones tecnicas de nuestro productos por separado a cada uno.	1	0
6	envio	Concentimiento y Curadoria para Envios	Envio a todo país, después de preenchido nuestro formulario de concentimiento e intereses daremos por iniciado la evalución de la curadoria para envios.	1	0
9	category	Categorias Ilustración, Arte o Pintura	Bienvenido a selección de filtros de nuestra galeria, filtro a Ilustraciones, Artes y Pinturas diferenciadas y personalizadas.	1	0
10	thanks	Agradecimiento...	Agradecemos por preencher nuestro formulario de concentimiento y curadoria, en la brevetud entraremos en contacto con ustedes!	1	0
11	dev	Desarrollado por Afonso Arruda Gesualdi	Desarrollado por Afonso Arruda Gesualdi, alumno de Da Vinci - Escuela de Multimedia, Argentina, en año de 2025.	1	0
12	dashboard	Painel de Control Administrador	Bienvenido al Painel de Control Administración de Equipo Malba	1	2
13	admin_artista	Central de Administración de Artista.	Painel de control de Artistas y administración de informaciones válidas.	1	2
14	add_artista	Painel de Adición de Artista.	Painel de control para agregar Artistas.	1	2
15	admin_obras	Administración de Obras y visualización.	Central de control administrativo de las obras para visualización.	1	2
16	add_obras	Adicionar Obras	Painel de control de Adición de Obras nuevas.	1	2
18	edit_artista	Edición de Artista	Painel de Control para edición de Artistas caso haya errores	1	2
19	edit_obras	Edición de Obras	Painel de Control para edición de Artistas caso haya errores	1	2
20	delete_artista	Borrar Artista	¿Desea Realmente BORRAR este Artista?	1	2
21	delete_obras	Borrar Obra	¿Desea Realmente BORRAR esta Obra?	1	2
22	admin_categoria	Administrador de Categoria	Painel de Control de Categorias	1	2
23	add_categoria	Adición de Categoria	Painel de control de adicción de categoría	1	2
24	edit_categoria	Edición de Categoria	Painel de control de Edición de Categoria	1	2
25	delete_categoria	Deletar Categoria	Painel de delete de categoria selecionada	1	2
26	login	Login de Usuarios	Sección de Login de Usuarios administrativo MALBA.	1	0
27	add_tecnica	Adicionar tecnica	Painel de Control de Tecnicas	1	0
28	delete_tecnica	Deletar Tecnica	Deseas Deletar la tecnica?	1	0
29	admin_tecnica	Administrador de Tecnicas Creadas	Administración de las tecnicas creadas.	1	0
30	edit_tecnica	Editar Tecnica	Edición de Tecnica 	1	0
31	cart	Mis Productos - Carrito de Compra	Carrito de compras, visualize sus obras en un click!	1	0
32	checkout	Checkout de su Compra	Ultimos pasos para obtener su obra en su casa	1	1
33	user_panel	Painel de Usuario - Visualize sus compras y sus solicituds!	Visualize sus ultimas compras realizadas, y las solicitud de aprobación por el equipo con base a nuestras evaluaciones.	1	1
\.


--
-- Name: detalles_artista_artista_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.detalles_artista_artista_id_seq', 1, false);


--
-- Name: detalles_artista_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.detalles_artista_id_seq', 1, false);


--
-- Name: galeria_artista_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeria_artista_id_seq', 1, false);


--
-- Name: galeria_categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeria_categoria_id_seq', 1, false);


--
-- Name: galeria_coleccion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeria_coleccion_id_seq', 1, false);


--
-- Name: galeria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeria_id_seq', 1, false);


--
-- Name: galeria_tecnica_galeria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeria_tecnica_galeria_id_seq', 1, false);


--
-- Name: galeria_tecnica_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeria_tecnica_id_seq', 1, false);


--
-- Name: galeria_tecnica_tecnica_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.galeria_tecnica_tecnica_id_seq', 1, false);


--
-- Name: item_compra_compra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.item_compra_compra_id_seq', 1, false);


--
-- Name: item_compra_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.item_compra_id_seq', 1, false);


--
-- Name: item_compra_item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.item_compra_item_id_seq', 1, false);


--
-- Name: tecnica_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tecnica_id_seq', 1, false);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 1, false);


--
-- Name: views_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.views_id_seq', 1, false);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: views views_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.views
    ADD CONSTRAINT views_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

