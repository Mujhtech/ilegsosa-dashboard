import React from 'react'
import { Link } from 'react-router-dom'
import Nav from '../../components/Nav'
import Sidebar from '../../components/Sidebar'

export default function DiscussionIndex() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div className="main-content">
                <section className="section">
                    <div className="section-header">
                        <h1>Discussion Thread</h1>
                    </div>
                    <div className="section-body">
                        <div className="row mt-5">
                            <div className="col-lg-8 col-md-12 col-12 col-sm-12">
                                <div className="card">
                                    <div className="card-header">
                                        <ul className="nav nav-pills">
                                            <li className="nav-item">
                                                <a className="nav-link active" href="#">All </a>
                                            </li>
                                            <li className="nav-item">
                                                <a className="nav-link" href="#">Politics</a>
                                            </li>
                                            <li className="nav-item">
                                                <a className="nav-link" href="#">Career</a>
                                            </li>
                                            <li className="nav-item">
                                                <a className="nav-link" href="#">Sports</a>
                                            </li>
                                            <li className="nav-item">
                                                <a className="nav-link" href="#">Networking</a>
                                            </li>
                                            <div className="card-header-action section-header-button float-right ml-5">
                                                <Link to="/create-discussion-thread" className="btn btn-primary">+ Create New PoIL</Link>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div className="col-12 col-sm-12 col-lg-8">
                                <div className="card">
                                    <a href="discussion-post.html"><div className="card-body">
                                        <ul className="list-unstyled list-unstyled-border list-unstyled-noborder">
                                            <li className="media">
                                                <img alt="image" className="mr-3 rounded-circle" width="70" src="../assets/img/avatar/avatar-1.png" />
                                                <div className="media-body">
                                                    <div className="media-right"><div className="text-primary">31 Oct 2021</div></div>
                                                    <div className="media-title mb-1">HRH (ENGR.) Adedoyin Adelekun</div>
                                                    <div className="text-info">NATIONAL PRESIDENT</div>
                                                    <div className="text-primary mt-4">ILEGSOSA NATIONAL WORKING COMMITTEE MEETING</div>
                                                    <div className="media-description text-muted">INVITED ADDRESS TO THE ILESA GRAMMAR SCHOOL OLD STUDENTS’ ASSOCIATION National Working Committee Saturday Oct 23rd 2021. The National President of ILEGSOSA, Dr Obi Daramola The Executive leadership of the National Executive of ILEGSOSA The members of The National Working Committee</div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div className="float-right mt-sm-0 mt-3">
                                            <a href="#" className="btn"><i className="far fa-thumbs-up"> 50</i></a>
                                            <a href="#" className="btn"><i className="far fa-comment">24</i></a>
                                        </div>
                                    </div></a>
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


                        </div>



                        <div className="row mt-4">
                            <div className="col-12">
                                <div className="card">
                                    <div className="card-header">
                                        <h4>All My Posts</h4>
                                    </div>
                                    <div className="card-body">
                                        <div className="float-left">
                                            <select className="form-control selectric">
                                                <option>Action For Selected</option>
                                                <option>Move to Draft</option>
                                                <option>Move to Pending</option>
                                                <option>Delete Pemanently</option>
                                            </select>
                                        </div>
                                        <div className="float-right">
                                            <form>
                                                <div className="input-group">
                                                    <input type="text" className="form-control" placeholder="Search" />
                                                    <div className="input-group-append">
                                                        <button className="btn btn-primary"><i className="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div className="clearfix mb-3"></div>

                                        <div className="table-responsive">
                                            <table className="table table-striped">
                                                <tr>
                                                    <th className="text-center pt-2">
                                                        <div className="custom-checkbox custom-checkbox-table custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" className="custom-control-input" id="checkbox-all" />
                                                            <label for="checkbox-all" className="custom-control-label">&nbsp; </label>
                                                        </div>
                                                    </th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div className="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" className="custom-control-input" id="checkbox-2" />
                                                            <label for="checkbox-2" className="custom-control-label">&nbsp; </label>
                                                        </div>
                                                    </td>
                                                    <td>Class of ’15 Reunion
                                                        <div className="table-links">
                                                            <a href="#">View</a>
                                                            <div className="bullet"></div>
                                                            <a href="#">Edit</a>
                                                            <div className="bullet"></div>
                                                            <a href="#" className="text-danger">Trash</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#">Events</a>
                                                    </td>
                                                    <td>2018-01-20</td>
                                                    <td><div className="badge badge-primary">Published</div></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div className="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" className="custom-control-input" id="checkbox-3" />
                                                            <label for="checkbox-3" className="custom-control-label">&nbsp; </label>
                                                        </div>
                                                    </td>
                                                    <td>Quick response to Dr. Bolupe Awe’s letter by the national president Ilegsosa, Dr. Obi Daramola.
                                                        <div className="table-links">
                                                            <a href="#">View</a>
                                                            <div className="bullet"></div>
                                                            <a href="#">Edit</a>
                                                            <div className="bullet"></div>
                                                            <a href="#" className="text-danger">Trash</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#">Politics</a>
                                                    </td>
                                                    <td>2018-01-20</td>
                                                    <td><div className="badge badge-primary">Published</div></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div className="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" className="custom-control-input" id="checkbox-4" />
                                                            <label for="checkbox-4" className="custom-control-label">&nbsp; </label>
                                                        </div>
                                                    </td>
                                                    <td>Re: Appeal to Governor Oyetola by Dr Bolupe Awe.
                                                        <div className="table-links">
                                                            <a href="#">View</a>
                                                            <div className="bullet"></div>
                                                            <a href="#">Edit</a>
                                                            <div className="bullet"></div>
                                                            <a href="#" className="text-danger">Trash</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#">Politics</a>
                                                    </td>
                                                    <td>2018-01-20</td>
                                                    <td><div className="badge badge-warning">Draft</div></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div className="float-right">
                                            <nav>
                                                <ul className="pagination">
                                                    <li className="page-item disabled">
                                                        <a className="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                            <span className="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li className="page-item active">
                                                        <a className="page-link" href="#">1</a>
                                                    </li>
                                                    <li className="page-item">
                                                        <a className="page-link" href="#">2</a>
                                                    </li>
                                                    <li className="page-item">
                                                        <a className="page-link" href="#">3</a>
                                                    </li>
                                                    <li className="page-item">
                                                        <a className="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                            <span className="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
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
