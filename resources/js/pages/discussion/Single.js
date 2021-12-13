import React from 'react'
import Nav from '../../components/Nav'
import Sidebar from '../../components/Sidebar'

export default function DiscussionSingle() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div className="main-content">
                <section className="section">
                    <div className="section-header">
                        <h1>Discussion Post</h1>
                    </div>
                    <div className="section-body">
                        <div className="row mt-5">
                            <div className="col-12 col-sm-12 col-lg-8">
                                <div className="card">
                                    <div className="card-body">
                                        <ul className="list-unstyled list-unstyled-border list-unstyled-noborder">
                                            <li className="media">
                                                <img alt="image" className="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png" />
                                                <div className="media-body">
                                                    <div className="media-right"><div className="text-primary">31 Oct 2021</div></div>
                                                    <div className="media-title mb-1">Bolupe Awe</div>
                                                    <div className="text-info">Business Executive</div>
                                                    <h6 className="text-primary mt-4">Re: Appeal to Governor Oyetola by Dr Bolupe Awe.</h6>
                                                    <div className="media-description text-muted mt-4">Below is from Bolupe Awe, on Facebook

                                                        AN APPEAL TO GOVERNOR OYETOLA ON THE USE OF ILESA GRAMMAR SCHOOL AS TEMPORARY SITE FOR THE PROPOSED POLICE SECONDARY SCHOOL ILESA.
                                                        I want to make this passionate appeal to my amiable and listening Governor Gboyega Oyetola to reconsider his decision to grant approval to Nigeria Police to use Ilesa Grammar School Premisis as a temporary site for the proposed Police Secondary School Ilesa.I consider the location of the Police College as a good development in view of its socio-economic benefit but am a bit worried about the implications of that decision.
                                                        1. For how long will the school be domiciled at Ilesa Grammar School Ground?
                                                        2. How are the principals going to maintain discipline?
                                                        3. What is going to be the effect of the presence of Police College on the existing structure in the school?For instance the Nigerian Police has their own colour.Is it likely that certain section of the school will be painted in police colour?
                                                        4. In the area of tradition, how will the Police ensure that its usual parade does not cause distraction to the students as well as the teaching staff?
                                                        5. Is such location of a Police College in a public school not a marriage between strange bed fellows?
                                                        6. Was the Ilesa Grammar School Old Students Association consulted before such decision was taken considering the fact that it is a major stakeholder in the school?
                                                        7. What is going to be the outcome of interaction between police college students and ilesa grammar school students
                                                        All these questions need to be well addressed before a final decision.If there was no secondary school at Ilesa would the Police not establish a secondary school at Ilesa?Why is it that the Police could not erect few structures on its permanent site before admitting the first set of students?Am aware there is Air Force Secondary School at Iyana Offa, why is it that the Police cannot draw from the experience of sister organisation in order to establish their schools.Am worried about this arrangement.As the Yorubas would say ohun to wa leyin ofa o ju oje lo.Baba mi e bunmi loode sun loyo se kofi gbale ufe.</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div className="float-right mt-sm-0 mt-3">
                                            <a href="#" className="btn"><i className="far fa-thumbs-up"> 50</i></a>
                                            <a href="#" className="btn"><i className="far fa-comment">24</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div className="col-lg-4 col-md-12 col-12 col-sm-12">
                                <div className="card">
                                    <div className="card-header">
                                        <h4>Must Read Posts</h4>
                                    </div>
                                    <div className="card-body">
                                        <div className="list-group">
                                            <a href="#" className="list-group-item list-group-item-action flex-column align-items-start">
                                                <div className="d-flex w-100 justify-content-between">
                                                    <p className="mb-1 text-primary">Please read this rules before you start posting on the discussion thread</p>
                                                </div>
                                            </a>
                                            <a href="#" className="list-group-item list-group-item-action flex-column align-items-start">
                                                <div className="d-flex w-100 justify-content-between">
                                                    <p className="mb-1">Our Constitution</p>
                                                </div>
                                            </a>
                                        </div>
                                        <div className="card-header mt-3">
                                            <h4>Featured links</h4>
                                        </div>

                                        <div className="list-group">
                                            <a href="#" className="list-group-item list-group-item-action flex-column align-items-start">
                                                <div className="d-flex w-100 justify-content-between">
                                                    <p className="mb-1">Class of ’15 Reunion</p>
                                                </div>
                                            </a>
                                            <a href="#" className="list-group-item list-group-item-action flex-column align-items-start">
                                                <div className="d-flex w-100 justify-content-between">
                                                    <p className="mb-1">Quick response to Dr. Bolupe Awe’s letter by the national president Ilegsosa, Dr. Obi Daramola.</p>
                                                </div>
                                            </a>
                                            <a href="#" className="list-group-item list-group-item-action flex-column align-items-start">
                                                <div className="d-flex w-100 justify-content-between">
                                                    <p className="mb-1">Re: Appeal to Governor Oyetola by Dr Bolupe Awe.</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div className="col-12 col-sm-12 col-lg-8">
                                <div className="card">
                                    <div className="card-header">
                                        <h4>Comments</h4>
                                    </div>
                                    <div className="card-body">
                                        <div className="form-group">
                                            <label>Type in your comments</label>
                                            <input type="text" className="form-control colorpickerinput" />
                                        </div>
                                        <button className="btn btn-secondary mr-1" type="reset">Cancel</button>
                                        <button className="btn btn-primary" type="submit">Comment</button>

                                        <ul className="list-unstyled list-unstyled-border list-unstyled-noborder mt-4">
                                            <li className="media">
                                                <img alt="image" className="mr-3 rounded-circle" width="70" src="assets/img/avatar/avatar-1.png" />
                                                <div className="media-body">

                                                    <div className="media-title mb-1">Rizal Fakhri</div>
                                                    <div className="text-time">Yesterday</div>
                                                    <div className="media-description text-muted">This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.</div>
                                                    <div className="media-links">
                                                        <a href="#" className="btn"><i className="far fa-thumbs-up"> 50</i></a>
                                                        <div className="media-right"><a href="#" className="btn btn-outline-info text-info"><i className="fas fa-reply"> Reply</i></a></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li className="media mt-4">
                                                <img alt="image" className="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png" />
                                                <div className="media-body">

                                                    <div className="media-title mb-1">Rizal Fakhri</div>
                                                    <div className="text-time">Yesterday</div>
                                                    <div className="media-description text-muted">This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.</div>
                                                    <div className="media-links">
                                                        <a href="#" className="btn"><i className="far fa-thumbs-up"> 50</i></a>
                                                        <div className="media-right"><a href="#" className="btn btn-outline-info text-info"><i className="fas fa-reply"> Reply</i></a></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li className="media mt-4">
                                                <img alt="image" className="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png" />
                                                <div className="media-body">

                                                    <div className="media-title mb-1">Rizal Fakhri</div>
                                                    <div className="text-time">Yesterday</div>
                                                    <div className="media-description text-muted">This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.This is a sample comment.</div>
                                                    <div className="media-links">
                                                        <a href="#" className="btn"><i className="far fa-thumbs-up"> 50</i></a>
                                                        <div className="media-right"><a href="#" className="btn btn-outline-info text-info"><i className="fas fa-reply"> Reply</i></a></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>




                        </div>


                    </div>
                </section>
            </div>
        </div>
    )
}
