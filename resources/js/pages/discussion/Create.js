import React from 'react'
import Nav from '../../components/Nav'
import Sidebar from '../../components/Sidebar'

export default function DiscussionCreate() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div className="main-content">
                <section className="section">
                    <div className="section-header">
                        <h1>Create Post</h1>
                    </div>
                    <div className="section-body">
                        <div className="row mt-5">
                            <div className="col-lg-8 col-md-12 col-12 col-sm-12">
                                <div className="card">
                                    <div className="card-header">
                                        <h4>Discussion Thread Post</h4>
                                    </div>
                                    <div className="card-body">
                                        <div className="form-group row mb-4">
                                            <label className="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                            <div className="col-sm-12 col-md-7">
                                                <input type="text" className="form-control" />
                                            </div>
                                        </div>
                                        <div className="form-group row mb-4">
                                            <label className="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                            <div className="col-sm-12 col-md-7">
                                                <select className="form-control selectric">
                                                    <option>Politics</option>
                                                    <option>Career</option>
                                                    <option>Sports</option>
                                                    <option>Networking</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div className="form-group row mb-4">
                                            <label className="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                            <div className="col-sm-12 col-md-7">
                                                <textarea className="summernote-simple"></textarea>
                                            </div>
                                        </div>
                                        <div className="form-group row mb-4">
                                            <label className="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div className="col-sm-12 col-md-7">
                                                <button className="btn btn-outline-info mr-3">Save as draft</button>
                                                <button className="btn btn-primary">Publish</button>
                                            </div>
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


                        </div>


                    </div>
                </section>
            </div>
        </div>
    )
}
