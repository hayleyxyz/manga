delete from manga.series_facet;
delete from manga.facets;
delete from manga.series;

insert into manga.series (id, title, year, description, external_id, created_at, updated_at) (
	select id, name, year, description, mu_id, created_at, updated_at from mangaindex.series
);

insert into manga.facets (id, name, created_at, updated_at) (
	select id, name, created_at, updated_at from mangaindex.facets
);

insert into manga.series_facet (series_id, facet_id, type, created_at, updated_at) (
	select series_id, facet_id, if(type = 'category', 'tag', type), now(), now() from mangaindex.facet_series
);

select series.*, group_concat(facets.name) as facets from manga.series
left join manga.series_facet on series_facet.series_id = series.id
left join manga.facets on facets.id = series_facet.facet_id
group by series.id
limit 100;