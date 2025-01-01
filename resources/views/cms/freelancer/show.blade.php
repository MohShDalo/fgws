@extends('layouts.cms')

@section('title')
{{__('caption.cms.menu-item.freelancer-menu.view',['name'=>$freelancer->id??''] )}}
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<h1>{{__('caption.cms.menu-item.freelancer-menu.view',["name"=>$freelancer->id??''])}}</h1>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.freelancer.main_career')}}</label>
						<div class="form-control">{!!$freelancer->main_career??'-'!!}</div>
					</div>
					<div class="mb-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
						<label for="">{{__('caption.cms.fields.freelancer.place_of_birth')}}</label>
						<div class="form-control">{!!$freelancer->place_of_birth??'-'!!}</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<!-- Note -->
			</div>
		</div>
	</div>
	<div class="col-12 mt-3">
		<div class="row justify-content-center">
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<a href="{{route('freelancer.edit',$freelancer->id)}}" class="btn btn-outline-primary form-control">{{__('caption.labels.edit')}}</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
				<form action="{{route('freelancer.destroy',$freelancer->id)}}" method="POST">
					@csrf
					@method('DELETE')
					<input type="submit" class="form-control btn btn-outline-{{$freelancer->deleted_at?'success':'danger'}}" value="{{__('caption.labels.'.($freelancer->deleted_at?'restore':'delete'))}}">
				</form>
			</div>
		</div>
	</div>
</div>

<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.skill-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_skills"
	model="\\App\\Models\\Skill"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->skills()"
	:otherRoutes="[]"
	showRoute="skill.show"
	editRoute="skill.edit"
	deleteRoute="skill.destroy"
	:fieldsNames="['title','category_text','show_text','freelancer_id',]"
	:colLabels="[
				__('caption.cms.fields.skill.title'),
				__('caption.cms.fields.skill.category'),
				__('caption.cms.fields.skill.show'),
				__('caption.cms.fields.skill.freelancer_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.certificate-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_certificates"
	model="\\App\\Models\\Certificate"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->certificates()"
	:otherRoutes="[]"
	showRoute="certificate.show"
	editRoute="certificate.edit"
	deleteRoute="certificate.destroy"
	:fieldsNames="['course_title','hours','start_date_formated','end_date_formated','organizer','category_text','file','show_text','note','freelancer_id',]"
	:colLabels="[
				__('caption.cms.fields.certificate.course_title'),
				__('caption.cms.fields.certificate.hours'),
				__('caption.cms.fields.certificate.start_date'),
				__('caption.cms.fields.certificate.end_date'),
				__('caption.cms.fields.certificate.organizer'),
				__('caption.cms.fields.certificate.category'),
				__('caption.cms.fields.certificate.file'),
				__('caption.cms.fields.certificate.show'),
				__('caption.cms.fields.certificate.note'),
				__('caption.cms.fields.certificate.freelancer_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.education-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_educations"
	model="\\App\\Models\\Education"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->educations()"
	:otherRoutes="[]"
	showRoute="education.show"
	editRoute="education.edit"
	deleteRoute="education.destroy"
	:fieldsNames="['title','score','show_score_text','start_date_formated','end_date_formated','organizer','category_text','special_rank','note','freelancer_id',]"
	:colLabels="[
				__('caption.cms.fields.education.title'),
				__('caption.cms.fields.education.score'),
				__('caption.cms.fields.education.show_score'),
				__('caption.cms.fields.education.start_date'),
				__('caption.cms.fields.education.end_date'),
				__('caption.cms.fields.education.organizer'),
				__('caption.cms.fields.education.category'),
				__('caption.cms.fields.education.special_rank'),
				__('caption.cms.fields.education.note'),
				__('caption.cms.fields.education.freelancer_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.language-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_languages"
	model="\\App\\Models\\Language"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->languages()"
	:otherRoutes="[]"
	showRoute="language.show"
	editRoute="language.edit"
	deleteRoute="language.destroy"
	:fieldsNames="['language','category_text','general_score','speaking_score','writing_score','listening_score','show_details_text','note','freelancer_id',]"
	:colLabels="[
				__('caption.cms.fields.language.language'),
				__('caption.cms.fields.language.category'),
				__('caption.cms.fields.language.general_score'),
				__('caption.cms.fields.language.speaking_score'),
				__('caption.cms.fields.language.writing_score'),
				__('caption.cms.fields.language.listening_score'),
				__('caption.cms.fields.language.show_details'),
				__('caption.cms.fields.language.note'),
				__('caption.cms.fields.language.freelancer_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.experience-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_experiences"
	model="\\App\\Models\\Experience"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->experiences()"
	:otherRoutes="[]"
	showRoute="experience.show"
	editRoute="experience.edit"
	deleteRoute="experience.destroy"
	:fieldsNames="['postion','company_name','company_address','start_date_formated','end_date_formated','category_text','note','freelancer_id',]"
	:colLabels="[
				__('caption.cms.fields.experience.postion'),
				__('caption.cms.fields.experience.company_name'),
				__('caption.cms.fields.experience.company_address'),
				__('caption.cms.fields.experience.start_date'),
				__('caption.cms.fields.experience.end_date'),
				__('caption.cms.fields.experience.category'),
				__('caption.cms.fields.experience.note'),
				__('caption.cms.fields.experience.freelancer_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.portfolio-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_portfolios"
	model="\\App\\Models\\Portfolio"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->portfolios()"
	:otherRoutes="[]"
	showRoute="portfolio.show"
	editRoute="portfolio.edit"
	deleteRoute="portfolio.destroy"
	:fieldsNames="['title','release_date_formated','link','categry_text','mockup_image','file','note','freelancer_id',]"
	:colLabels="[
				__('caption.cms.fields.portfolio.title'),
				__('caption.cms.fields.portfolio.release_date'),
				__('caption.cms.fields.portfolio.link'),
				__('caption.cms.fields.portfolio.categry'),
				__('caption.cms.fields.portfolio.mockup_image'),
				__('caption.cms.fields.portfolio.file'),
				__('caption.cms.fields.portfolio.note'),
				__('caption.cms.fields.portfolio.freelancer_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.reference-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_references"
	model="\\App\\Models\\Reference"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->references()"
	:otherRoutes="[]"
	showRoute="reference.show"
	editRoute="reference.edit"
	deleteRoute="reference.destroy"
	:fieldsNames="['full_name','contact_number','email','postion','note','freelancer_id',]"
	:colLabels="[
				__('caption.cms.fields.reference.full_name'),
				__('caption.cms.fields.reference.contact_number'),
				__('caption.cms.fields.reference.email'),
				__('caption.cms.fields.reference.postion'),
				__('caption.cms.fields.reference.note'),
				__('caption.cms.fields.reference.freelancer_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.post-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_posts"
	model="\\App\\Models\\Post"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->posts()"
	:otherRoutes="[]"
	showRoute="post.show"
	editRoute="post.edit"
	deleteRoute="post.destroy"
	:fieldsNames="['content','image','owner_id',]"
	:colLabels="[
				__('caption.cms.fields.post.content'),
				__('caption.cms.fields.post.image'),
				__('caption.cms.fields.post.owner_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.job-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_jobs"
	model="\\App\\Models\\Job"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->jobs()"
	:otherRoutes="[]"
	showRoute="job.show"
	editRoute="job.edit"
	deleteRoute="job.destroy"
	:fieldsNames="['content','needed_postion','max_price','max_time','expected_start_date_formated','worker_id','owner_id',]"
	:colLabels="[
				__('caption.cms.fields.job.content'),
				__('caption.cms.fields.job.needed_postion'),
				__('caption.cms.fields.job.max_price'),
				__('caption.cms.fields.job.max_time'),
				__('caption.cms.fields.job.expected_start_date'),
				__('caption.cms.fields.job.worker_id'),
				__('caption.cms.fields.job.owner_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
<hr>
<br>
<div class="row">
	<div class="col-12">
	<h2>{{__('caption.cms.menu-item.offer-menu.index' )}}</h2>
	</div>
</div>
	<x-table
	parentClass="mb-3"
	idName="view_all_offers"
	model="\\App\\Models\\Offer"
	recordPk="id"
	:extraValues="[]"
	:extraValuesColsNames="[]"
	:dataRecord="$freelancer->offers()"
	:otherRoutes="[]"
	showRoute="offer.show"
	editRoute="offer.edit"
	deleteRoute="offer.destroy"
	:fieldsNames="['content','price','time','status_text','status_reason','owner_id','job_content',]"
	:colLabels="[
				__('caption.cms.fields.offer.content'),
				__('caption.cms.fields.offer.price'),
				__('caption.cms.fields.offer.time'),
				__('caption.cms.fields.offer.status'),
				__('caption.cms.fields.offer.status_reason'),
				__('caption.cms.fields.offer.owner_id'),
				__('caption.cms.fields.offer.job_id'),
		]"
	:filters="[]"
	:filtersType="[]"
	:filtersValues="[]"
	:filtersBootstrap="[]"
	:filtersLabels="[]"
	:resetUrl="route('freelancer.show',$freelancer->id)"
></x-table>
@endsection
